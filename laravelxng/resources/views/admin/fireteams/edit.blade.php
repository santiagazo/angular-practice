<html>
<head>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style>
	.completed{
		text-decoration: line-through;
	}

</style>

<div id="app">
	<ul class="list-unstyled">
		<li :class="{'completed': task.completed}"
			v-for='task in tasks'
			@click="toggleCompletedFor(task)"
		>
			@{{ task.body }}

		</li>
		<li><pre>@{{ $data | json }}</pre></li>
	</ul>
</div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.js"></script>
<script>

new Vue({

	el: '#app',

	data: {
		tasks: [
			{ body:'Go to the store', completed: false },
			{ body:'Go to the bank', completed: false },
			{ body:'Go to the doctor', completed: true },
		]
	},

	methods: {
		toggleCompletedFor: function(task){
			console.log(task.completed);
			task.completed = ! task.completed;
		}
	}

});


</script>
</body>
</html>
