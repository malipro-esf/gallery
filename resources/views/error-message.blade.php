@if(session()->has('error-message'))
	<div class="alert alert-danger alert-slide-up" role="alert">
		<p class="text-center" style="font-weight: bold;">{{__("messages.".session()->get('error-message')) }}</p>
	</div>
@endif
