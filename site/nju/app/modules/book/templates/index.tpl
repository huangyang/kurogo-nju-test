{include file="findInclude:common/templates/header.tpl"}

{block name="bookHeader"}
  {include file="findInclude:common/templates/search.tpl" extraArgs=$extraArgs}
{/block}

{include file="findInclude:common/templates/results.tpl" results=$bookList}

{include file="findInclude:common/templates/footer.tpl"}