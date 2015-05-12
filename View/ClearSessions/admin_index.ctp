<?php
	
if (!$this->request->is('ajax') && isset($this->request->params['admin'])):
	$this->Html->script('ClearSession.sessions', array('inline' => false));
endif;

$this->set('showActions', false);
$this->extend(DS . 'Common' . DS . 'admin_index');
$this->Html->addCrumb('', DS . 'admin', array('icon' => 'home'))
->addCrumb(__d('clear_session', 'Sessions'));

$this->append('search', $this->element('Admin' . DS . 'clear_sessions_search'));

echo $this->Form->create('ClearSession', array('url' => array('plugin' => 'clear_session', 'controller' => 'clear_sessions', 'action' => 'process')));
?>
<table class="table table-striped">
	<?php
		$tableHeaders = $this->Html->tableHeaders(array(
			$this->Form->checkbox('checkAll'),
			$this->Paginator->sort('id', __d('clear_session', 'Id')),
			__d('clear_session', 'Data'),
			$this->Paginator->sort('expires', __d('clear_session', 'Expires Timestamp')),
			__d('clear_session', 'Expires Datetime'),
		));
	?>
	<thead>
		<?php echo $tableHeaders; ?>
	</thead>
	
	<?php
	
		$rows = array();
		foreach ($sessions as $session):
			$rows[] = array(
				$this->Form->checkbox('ClearSession.' . $session['ClearSession']['id'] . '.id'),
				$session['ClearSession']['id'],
				$this->Text->truncate(
					$session['ClearSession']['data'],
					55,
					array(
						'ellipsis' => '...',
						'exact' => true,
						'html' => false
					)),
				$session['ClearSession']['expires'],
				date('d.m.Y H:i:s', $session['ClearSession']['expires']),
			);
		endforeach;
		echo $this->Html->tableCells($rows);
	?>
</table>
<div class="row-fluid">
	<div id="bulk-action" class="control-group">
		<?php
			echo $this->Form->input('ClearSession.action', array(
				'label' => __d('clear_session', 'Applying to selected'),
				'div' => 'input inline',
				'options' => array(
					'delete' => __d('clear_session', 'Delete'),
				),
				'empty' => true,
			));
		?>
		<div class="controls">
			<?php echo $this->Form->end(__d('clear_session', 'Submit')); ?>
		</div>
	</div>
</div>