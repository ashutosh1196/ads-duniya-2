<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('User Verification') }}</div>
				<div class="card-body">
				<div style="font-size: 15px; color: #464d5d; padding: 30px 0 0 50px;">
					<p>Hello, {{ $username }}!</p>
					<br/>
					<p>You have successfully registered to Which Vocation.</p>
					<br/>
					<p>Please click the link below to verify your account.</p>
					<br/>
					<a href="{{ $link }}" class="btn btn-sm btn-success">Verify</a>
					<br/>
					<p><strong>--</strong></p>
					<p><strong>Thanks and Regards,</strong></p>
					<p><strong>Team Which Vocation</strong></p>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
