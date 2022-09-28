@if(session()->has('success-message'))
	<div class="alert alert-success alert-slide-up" role="alert">
		<p class="text-center" style="font-weight: bold;">{{ __("messages.".session()->get('success-message')) }}</p>
	</div>
@endif
