{extends file="parent:frontend/detail/tabs/description.tpl"}

{block name="frontend_detail_description_paul_right"}
	<div class="alert is--{$paulAlertType} is--rounded">
    		<div class="alert--icon">
        		<!-- Alert message icon -->
        		<i class="icon--element icon--check"></i>
    		</div>
    		<div class="alert--content">
        		{$paulMessageDescription}
    		</div>
	</div>
	{$smarty.block.parent}
{/block}
