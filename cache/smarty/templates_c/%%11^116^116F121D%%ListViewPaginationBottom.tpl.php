<?php /* Smarty version 2.6.31, created on 2023-04-06 14:04:55
         compiled from custom/include/ListView/ListViewPaginationBottom.tpl */ ?>


<?php $this->assign('alt_start', $this->_tpl_vars['navStrings']['start']); ?>
<?php $this->assign('alt_next', $this->_tpl_vars['navStrings']['next']); ?>
<?php $this->assign('alt_prev', $this->_tpl_vars['navStrings']['previous']); ?>
<?php $this->assign('alt_end', $this->_tpl_vars['navStrings']['end']); ?>

	<tr id='pagination' class="pagination-unique pagination-bottom" role='presentation'>
		<td colspan='<?php if ($this->_tpl_vars['prerow']): ?><?php echo $this->_tpl_vars['colCount']+1; ?>
<?php else: ?><?php echo $this->_tpl_vars['colCount']; ?>
<?php endif; ?>'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%' class='paginationTable'>
				<tr>
					<td nowrap="nowrap" class='paginationActionButtons'>
						&nbsp;
					</td>
					<td  nowrap='nowrap' align="right" class='paginationChangeButtons' width="1%">
						<?php if ($this->_tpl_vars['pageData']['urls']['startPage']): ?>
							<button type='button' id='listViewStartButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewStartButton' title='<?php echo $this->_tpl_vars['navStrings']['start']; ?>
' class='list-view-pagination-button' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks(0, "<?php echo $this->_tpl_vars['moduleString']; ?>
");'<?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['startPage']; ?>
"' <?php endif; ?>>
								<span class='suitepicon suitepicon-action-first'></span>
							</button>
						<?php else: ?>
							<button type='button' id='listViewStartButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewStartButton' title='<?php echo $this->_tpl_vars['navStrings']['start']; ?>
' class='list-view-pagination-button' disabled='disabled'>
								<span class='suitepicon suitepicon-action-first'></span>
							</button>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['pageData']['urls']['prevPage']): ?>
							<button type='button' id='listViewPrevButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewPrevButton' title='<?php echo $this->_tpl_vars['navStrings']['previous']; ?>
' class='list-view-pagination-button' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks(<?php echo $this->_tpl_vars['pageData']['offsets']['prev']; ?>
, "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['prevPage']; ?>
"'<?php endif; ?>>
								<span class='suitepicon suitepicon-action-left'></span>
							</button>
						<?php else: ?>
							<button type='button' id='listViewPrevButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewPrevButton' class='list-view-pagination-button' title='<?php echo $this->_tpl_vars['navStrings']['previous']; ?>
' disabled='disabled'>
								<span class='suitepicon suitepicon-action-left'></span>
							</button>
						<?php endif; ?>
					</td>
					<td nowrap='nowrap' width="1%" class="paginationActionButtons">
						<div class='pageNumbers'>(<?php if ($this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage'] == 0): ?>0<?php else: ?><?php echo $this->_tpl_vars['pageData']['offsets']['current']+1; ?>
<?php endif; ?> - <?php echo $this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage']; ?>
 <?php echo $this->_tpl_vars['navStrings']['of']; ?>
 <?php if ($this->_tpl_vars['pageData']['offsets']['totalCounted']): ?><?php echo $this->_tpl_vars['pageData']['offsets']['total']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pageData']['offsets']['total']; ?>
<?php if ($this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage'] != $this->_tpl_vars['pageData']['offsets']['total']): ?>+<?php endif; ?><?php endif; ?>)</div>
					</td>
					<td nowrap='nowrap' align="right" class='paginationActionButtons' width="1%">
						<?php if ($this->_tpl_vars['pageData']['urls']['nextPage']): ?>
							<button type='button' id='listViewNextButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewNextButton' title='<?php echo $this->_tpl_vars['navStrings']['next']; ?>
' class='list-view-pagination-button' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks(<?php echo $this->_tpl_vars['pageData']['offsets']['next']; ?>
, "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['nextPage']; ?>
"'<?php endif; ?>>
								<span class='suitepicon suitepicon-action-right'></span>
							</button>
						<?php else: ?>
							<button type='button' id='listViewNextButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewNextButton' class='ist-view-pagination-button' title='<?php echo $this->_tpl_vars['navStrings']['next']; ?>
' disabled='disabled'>
								<span class='suitepicon suitepicon-action-right'></span>
							</button>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['pageData']['urls']['endPage'] && $this->_tpl_vars['pageData']['offsets']['total'] != $this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage']): ?>
							<button type='button' id='listViewEndButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewEndButton' title='<?php echo $this->_tpl_vars['navStrings']['end']; ?>
' class='list-view-pagination-button' <?php if ($this->_tpl_vars['prerow']): ?>onclick='return sListView.save_checks("end", "<?php echo $this->_tpl_vars['moduleString']; ?>
")' <?php else: ?> onClick='location.href="<?php echo $this->_tpl_vars['pageData']['urls']['endPage']; ?>
"'<?php endif; ?>>
								<span class='suitepicon suitepicon-action-last'></span>
							</button>
						<?php elseif (! $this->_tpl_vars['pageData']['offsets']['totalCounted'] || $this->_tpl_vars['pageData']['offsets']['total'] == $this->_tpl_vars['pageData']['offsets']['lastOffsetOnPage']): ?>
							<button type='button' id='listViewEndButton_<?php echo $this->_tpl_vars['action_menu_location']; ?>
' name='listViewEndButton' title='<?php echo $this->_tpl_vars['navStrings']['end']; ?>
' class='list-view-pagination-button' disabled='disabled'>
								<span class='suitepicon suitepicon-action-last'></span>
							</button>
						<?php endif; ?>
					</td>
					<td nowrap='nowrap' width="4px" class="paginationActionButtons"></td>
				</tr>
			</table>
		</td>
	</tr>