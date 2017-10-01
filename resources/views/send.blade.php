<!DOCTYPE html>
<html>
<head>
	<title>Email App</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="/css/email.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="div" id="app">
<h4> The Email App </h4>
<form method="post" action="{{ route('receive') }}">
	<input type="email" name="email" value="" placeholder="Email:">
	<input type="text" name="name" value="" placeholder="Message:">
	<input type="submit" value="submit">
	{{csrf_field()}}
</form>
<br>
<h4>The notifications</h4>
<ul>
	
</ul>
</div>
</body>
<script src="/js/app.js"></script>
<script>
	const ul = document.querySelector('ul');
	Echo.channel('queue-monitor')
		.listen('JobQueued', (e) => {
			const li = document.createElement('li');
			let text = "The Job: " + e.job.name + " has been added to Queue: " + e.job.queue + " on Connection: " + e.job.connection; 
			const itemText = document.createTextNode(text);
			li.appendChild(itemText);
			ul.appendChild(li);
		})
		.listen('JobExecuted', (e) => {
			const li = document.createElement('li');
			let text = "The Job: " + e.job.name + " has been executed from the Queue: " + e.job.queue + " on Connection: " + e.job.connection; 
			const itemText = document.createTextNode(text);
			li.appendChild(itemText);
			ul.appendChild(li);
		});
</script>
</html>

