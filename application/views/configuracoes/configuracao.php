<?php $this->load->view('common/_head'); ?>
<body ng-app='adman' ng-controller="configuracoes">
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<?php $this->load->view('common/_menu'); ?>
		<main class='mdl-layout__content mdl-color--grey-100 pdbot40'>
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col">
					<h4>Notificações</h4>

					<h5>
						Selecione os tipos de notificações que deseja receber
					</h5>

					<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="notificacaoEquipamentos">
						<input type="checkbox" ng-click='updateNotificacao("notificacaoEquipamentos")' id="notificacaoEquipamentos" class="mdl-switch__input" <?php if($config->notificacaoEquipamentos == 'S'){ echo 'checked'; } ?>>
						<span class="mdl-switch__label">Equipamentos</span>
					</label>

					<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="notificacaoAulas">
						<input type="checkbox" ng-click='updateNotificacao("notificacaoAulas")' id="notificacaoAulas" class="mdl-switch__input" <?php if($config->notificacaoAulas == 'S'){ echo 'checked'; } ?>>
						<span class="mdl-switch__label">Aulas</span>
					</label>

					<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="notificacaoTurmas">
						<input type="checkbox" ng-click='updateNotificacao("notificacaoTurmas")' id="notificacaoTurmas" class="mdl-switch__input" <?php if($config->notificacaoTurmas == 'S'){ echo 'checked'; } ?>>
						<span class="mdl-switch__label">Turmas</span>
					</label>
		
					<h5 id="notificacoesEmailTitle">
						Receber notificações por e-mail

						<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="notificacaoEmail">
							<input type="checkbox" ng-click='updateNotificacao("notificacaoEmail")' id="notificacaoEmail" class="mdl-switch__input" <?php if($config->notificacaoEmail == 'S'){ echo 'checked'; } ?>>
							<span class="mdl-switch__label"></span>
						</label>
					</h5>

				</div>
	
				<?php if ($this->permissoes->permissao->editar): ?>
				<div class="mdl-cell mdl-cell--12-col">
					<h4>Permissões</h4>

					<h5>
						Administradores
						<div id="tooltipAdm" class="icon material-icons">info</div>
						<div class="mdl-tooltip" for="tooltipAdm">
							Administradores tem controle total sobre o sistema por padrão.
						</div>
					</h5>

					<table id="tableConfiguracoes" class="left mtop10 mdl-data-table mdl-js-data-tablemdl-shadow--2dp" ng-cloak ng-init="getAdms()">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Nome de usuário</th>
								<th>Opções</th>
							</tr>
						</thead>
						<tbody>	
							<tr ng-repeat="adm in adms">						
								<td>
									{{adm.nome}}
								</td>
								<td>
									{{adm.nickname}}
								</td>
								<td>
									<a href="#" ng-click="removerPermissao(adm)">
										<i class="material-icons mdl-color-text--red" title="Remover permissão de administrador de Nome do usuário">clear</i>
									</a>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3">
									<a ng-click="addAdm()" href="#" class="normal-link">
										Adicionar usuário administrador												
									</a>
								</td>
							</tr>
						</tfoot>
					</table>

				</div>

				<div class="mdl-cell mdl-cell--12-col">
					<h5>
						Funcionários
						<div id="tooltipFunc" class="icon material-icons">info</div>
						<div class="mdl-tooltip" for="tooltipFunc">
							Funcionários tem permissões mais restritas, que podem ser alteradas abaixo.
						</div>
					</h5>
				</div>

				<?php /* Usuários */ ?>
				<div class="mdl-cell mdl-cell--4-col">
					<div class="mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title">
							<h5 class="mdl-color-text--red mbot0 mtop10">Usuários</h5>
						</div>
						<div class="mdl-card__supporting-text">
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="visualizarUsuarios">
								<input type="checkbox" ng-click='updatePermissao("usuario","VISUALIZAR","FUNC",$event)' id="visualizarUsuarios" updatevisualizar="['adicionarUsuarios', 'editarUsuarios', 'excluirUsuarios']" class="mdl-switch__input" <?php echo $visualizarusuario ?>>
								<span class="mdl-switch__label">Visualizar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="adicionarUsuarios">
								<input type="checkbox" ng-click='updatePermissao("usuario","ADICIONAR","FUNC",$event)' id="adicionarUsuarios" checkvisualizar="visualizarUsuarios" class="mdl-switch__input" <?php echo $adicionarusuario ?>>
								<span class="mdl-switch__label">Adicionar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="editarUsuarios">
								<input type="checkbox" ng-click='updatePermissao("usuario","EDITAR","FUNC",$event)' id="editarUsuarios" checkvisualizar="visualizarUsuarios" class="mdl-switch__input" <?php echo $editarusuario ?>>
								<span class="mdl-switch__label">Editar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="excluirUsuarios">
								<input type="checkbox" ng-click='updatePermissao("usuario","EXCLUIR","FUNC",$event)' id="excluirUsuarios" checkvisualizar="visualizarUsuarios" class="mdl-switch__input" <?php echo $excluirusuario ?>>
								<span class="mdl-switch__label">Excluir</span>
							</label>
						</div>
					</div>
				</div>

				<?php /* Equipamentos */ ?>
				<div class="mdl-cell mdl-cell--4-col">
					<div class="mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title">
							<h5 class="mdl-color-text--red mbot0 mtop10">Equipamentos</h5>
						</div>
						<div class="mdl-card__supporting-text">
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="visualizarEquipamentos">
								<input type="checkbox" ng-click='updatePermissao("equipamento","VISUALIZAR","FUNC",$event)' id="visualizarEquipamentos" updatevisualizar="['adicionarEquipamentos', 'editarEquipamentos', 'excluirEquipamentos']" class="mdl-switch__input" <?php echo $visualizarequipamento ?>>
								<span class="mdl-switch__label">Visualizar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="adicionarEquipamentos">
								<input type="checkbox" ng-click='updatePermissao("equipamento","ADICIONAR","FUNC",$event)' id="adicionarEquipamentos" checkvisualizar="visualizarEquipamentos" class="mdl-switch__input" <?php echo $adicionarequipamento ?>>
								<span class="mdl-switch__label">Adicionar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="editarEquipamentos">
								<input type="checkbox" ng-click='updatePermissao("equipamento","EDITAR","FUNC",$event)' id="editarEquipamentos" checkvisualizar="visualizarEquipamentos" class="mdl-switch__input" <?php echo $editarequipamento ?>>
								<span class="mdl-switch__label">Editar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="excluirEquipamentos">
								<input type="checkbox" ng-click='updatePermissao("equipamento","EXCLUIR","FUNC",$event)' id="excluirEquipamentos" checkvisualizar="visualizarEquipamentos" class="mdl-switch__input" <?php echo $excluirequipamento ?>>
								<span class="mdl-switch__label">Excluir</span>
							</label>
						</div>
					</div>
				</div>

				<?php /* Modalidades de treino */ ?>
				<div class="mdl-cell mdl-cell--4-col">
					<div class="mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title">
							<h5 class="mdl-color-text--red mbot0 mtop10">Modalidades de treino</h5>
						</div>
						<div class="mdl-card__supporting-text">
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="visualizarModalidadesDeTreino">
								<input type="checkbox" ng-click='updatePermissao("modalidade_de_treino","VISUALIZAR","FUNC",$event)' id="visualizarModalidadesDeTreino" updatevisualizar="['adicionarModalidadesDeTreino', 'editarModalidadesDeTreino', 'excluirModalidadesDeTreino']" class="mdl-switch__input" <?php echo $visualizarmodalidadedetreino ?>>
								<span class="mdl-switch__label">Visualizar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="adicionarModalidadesDeTreino">
								<input type="checkbox" ng-click='updatePermissao("modalidade_de_treino","ADICIONAR","FUNC",$event)' id="adicionarModalidadesDeTreino" checkvisualizar="visualizarModalidadesDeTreino" class="mdl-switch__input" <?php echo $adicionarmodalidadedetreino ?>>
								<span class="mdl-switch__label">Adicionar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="editarModalidadesDeTreino">
								<input type="checkbox" ng-click='updatePermissao("modalidade_de_treino","EDITAR","FUNC",$event)' id="editarModalidadesDeTreino" checkvisualizar="visualizarModalidadesDeTreino" class="mdl-switch__input" <?php echo $editarmodalidadedetreino ?>>
								<span class="mdl-switch__label">Editar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="excluirModalidadesDeTreino">
								<input type="checkbox" ng-click='updatePermissao("modalidade_de_treino","EXCLUIR","FUNC",$event)' id="excluirModalidadesDeTreino" checkvisualizar="visualizarModalidadesDeTreino" class="mdl-switch__input" <?php echo $excluirmodalidadedetreino ?>>
								<span class="mdl-switch__label">Excluir</span>
							</label>
						</div>
					</div>
				</div>

				<?php /* Aulas */ ?>
				<div class="mdl-cell mdl-cell--4-col">
					<div class="mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title">
							<h5 class="mdl-color-text--red mbot0 mtop10">Aulas</h5>
						</div>
						<div class="mdl-card__supporting-text">
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="visualizarAulas">
								<input type="checkbox" ng-click='updatePermissao("aula","VISUALIZAR","FUNC",$event)' id="visualizarAulas" updatevisualizar="['adicionarAulas', 'editarAulas', 'excluirAulas']" class="mdl-switch__input" <?php echo $visualizaraula ?>>
								<span class="mdl-switch__label">Visualizar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="adicionarAulas">
								<input type="checkbox" ng-click='updatePermissao("aula","ADICIONAR","FUNC",$event)' id="adicionarAulas" checkvisualizar="visualizarAulas" class="mdl-switch__input" <?php echo $adicionaraula ?>>
								<span class="mdl-switch__label">Adicionar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="editarAulas">
								<input type="checkbox" ng-click='updatePermissao("aula","EDITAR","FUNC",$event)' id="editarAulas" checkvisualizar="visualizarAulas" class="mdl-switch__input" <?php echo $editaraula ?>>
								<span class="mdl-switch__label">Editar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="excluirAulas">
								<input type="checkbox" ng-click='updatePermissao("aula","EXCLUIR","FUNC",$event)' id="excluirAulas" checkvisualizar="visualizarAulas" class="mdl-switch__input" <?php echo $excluiraula ?>>
								<span class="mdl-switch__label">Excluir</span>
							</label>
						</div>
					</div>
				</div>

				<?php /* Turmas */ ?>
				<div class="mdl-cell mdl-cell--4-col">
					<div class="mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title">
							<h5 class="mdl-color-text--red mbot0 mtop10">Turmas</h5>
						</div>
						<div class="mdl-card__supporting-text">
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="visualizarTurmas">
								<input type="checkbox" ng-click='updatePermissao("turma","VISUALIZAR","FUNC",$event);' id="visualizarTurmas" updatevisualizar="['adicionarTurmas', 'editarTurmas', 'excluirTurmas']"  class="mdl-switch__input" <?php echo $visualizarturma ?>>
								<span class="mdl-switch__label">Visualizar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="adicionarTurmas">
								<input type="checkbox" ng-click='updatePermissao("turma","ADICIONAR","FUNC",$event)' id="adicionarTurmas" checkvisualizar="visualizarTurmas" class="mdl-switch__input" <?php echo $adicionarturma ?>>
								<span class="mdl-switch__label">Adicionar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="editarTurmas">
								<input type="checkbox" ng-click='updatePermissao("turma","EDITAR","FUNC",$event)' id="editarTurmas" checkvisualizar="visualizarTurmas" class="mdl-switch__input" <?php echo $editarturma ?>>
								<span class="mdl-switch__label">Editar</span>
							</label>
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="excluirTurmas">
								<input type="checkbox" ng-click='updatePermissao("turma","EXCLUIR","FUNC",$event)' id="excluirTurmas" checkvisualizar="visualizarTurmas" class="mdl-switch__input" <?php echo $excluirturma ?>>
								<span class="mdl-switch__label">Excluir</span>
							</label>
						</div>
					</div>
				</div>

				<?php /* Gráficos */ ?>
				<div class="mdl-cell mdl-cell--4-col">
					<div class="mdl-card mdl-shadow--2dp">
						<div class="mdl-card__title">
							<h5 class="mdl-color-text--red mbot0 mtop10">Gráficos</h5>
						</div>
						<div class="mdl-card__supporting-text">
							<label class="label-configuracao mdl-switch mdl-js-switch mdl-js-ripple-effect" for="visualizarGraficos">
								<input type="checkbox" ng-click='updatePermissao("grafico","VISUALIZAR","FUNC",$event)' id="visualizarGraficos" class="mdl-switch__input" <?php echo $visualizargrafico ?>>
								<span class="mdl-switch__label">Visualizar</span>
							</label>
						</div>
					</div>
				</div>
				<?php endif ?>


			</div>
		</main>
	</div>
	<script type="text/td" id="templateTd">
		<td>{{mdlMenu}}</td>
	</script>

	<script type="text/mdlMenu" id="templateMdlMenu">
		<a class="empty" href="#" id="autocompleteAdm" ng-model='autocompleteAdm' ng-keyup="updateAutocomplete()" ng-focus='clearInput()' contenteditable>Nome do cliente</a>
		<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="autocompleteAdm">
			{{mdlMenuItems}}
		</ul>
	</script>

	<script type="text/mdlMenuItem" id="templateMdlMenuItem">
		<li class="mdl-menu__item">
			<a href="javascript:;" class="normal-fw addAdm" idusuario="{{idUsuario}}">{{nomeUsuario}}</a>
		</li>
	</script>

	<?php $this->load->view('common/_footer'); ?>
</body>
