<?php $this->load->view('common/_head'); ?>
<body ng-controller="usuarioController">
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<?php $this->load->view('common/_menu'); ?>
		<main class='mdl-layout__content mdl-color--grey-100'>
			Home content
		</main>
	</div>

	<?php $this->load->view('common/_footer'); ?>
</body>