	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.helpers.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/global.js'); ?>"></script>
	<script src='<?php echo base_url('assets/js/material.min.js'); ?>'></script>
	<script src='<?php echo base_url('assets/js/ui-mask.js'); ?>'></script>
	<script src='<?php echo base_url('assets/js/ng-alertify.js'); ?>'></script>
	<?php if($this->uri->segment(1) == 'usuario'): ?>
	<script src="<?php echo base_url('assets/js/usuario.js'); ?>"></script>
	<?php endif; ?>
	<?php if($this->uri->segment(1) == 'cliente'): ?>
	<script src="<?php echo base_url('assets/js/cliente.js'); ?>"></script>
	<?php endif; ?>
	<?php if($this->uri->segment(1) == 'equipamento'): ?>
	<script src="<?php echo base_url('assets/js/equipamento.js'); ?>"></script>
	<?php endif; ?>
	<?php if($this->uri->segment(1) == 'modalidade'): ?>
	<script src="<?php echo base_url('assets/js/modalidade.js'); ?>"></script>
	<?php endif; ?>
	<?php if($this->uri->segment(1) == 'aula'): ?>
	<script src="<?php echo base_url('assets/js/aula.js'); ?>"></script>
	<?php endif; ?>
	<?php if($this->uri->segment(1) == 'turma'): ?>
	<script src="<?php echo base_url('assets/js/turma.js'); ?>"></script>
	<?php endif; ?>
	<?php if($this->uri->segment(1) == 'configuracoes'): ?>
	<script src="<?php echo base_url('assets/js/configuracoes.js'); ?>"></script>
	<?php endif; ?>
	<?php if($this->uri->segment(1) == 'entrada-saida'): ?>
	<script src="<?php echo base_url('assets/js/entrada-saida.js'); ?>"></script>
	<?php endif; ?>
	<?php if($this->uri->segment(1) == ''): ?>
	<script src="<?php echo base_url('assets/js/graphs/highcharts.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/graphs/modules/exporting.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/grafico.js'); ?>"></script>
	<?php endif; ?>
</html>