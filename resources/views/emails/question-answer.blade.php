<h2>New Answer to Question of the Week</h2>

<p><strong>Answer:</strong> {{ $data['answer'] }}</p>

@if(!empty($data['name']))
<p><strong>Name:</strong> {{ $data['name'] }}</p>
@endif

@if(!empty($data['location']))
<p><strong>Location:</strong> {{ $data['location'] }}</p>
@endif
