{extends file="findExtends:common/templates/pane.tpl"}
{block name="description"}
{if isset($description) && strlen($description)}
  <p class="{block name='headingClass'}nonfocal smallprint{/block}">
    {$description|escape}
  </p>
{/if}
{/block}