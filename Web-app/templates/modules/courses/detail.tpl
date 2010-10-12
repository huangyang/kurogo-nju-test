{include file="findInclude:common/header.tpl"}
{strip}

{$tabBodies = array()}
{capture name="infoPane" assign="infoPane"}
  {block name="infoPane"}
    <ul class="nav">
      {foreach $times as $time}
        <li>
          {if isset($time['location'], $time['url'])}
            <a class="map" href="{$time['url']}">
              {$time['days']} {$time['time']} ({$time['location']})
            </a>
          {else}
            {$time['days']} {$time['time']}
          {/if}
        </li>
      {/foreach}
      <li>
        <h3>Description:</h3>
        <p>{$description|escape}</p>
      </li>
    </ul>
  {/block}
{/capture}
{$tabBodies['info'] = $infoPane}

{capture name="staffPane" assign="staffPane"}
  {block name="staffPane"}
    <ul class="nav">
        <li><h3>Instructor(s):</h3></li>
        {foreach $staff['instructors'] as $instructor}
          <li><a href="{$instructor['url']}" class="people">{$instructor['title']}</a></li>
        {/foreach}
        
        {if count($staff['tas'])}
          <li><h3>TAs:</h3></li>
          {foreach $staff['tas'] as $ta}
            <li><a href="{$ta['url']}" class="people">{$ta['title']}</a></li>
          {/foreach}
        {/if}
    </ul>
  {/block}
{/capture}
{$tabBodies['staff'] = $staffPane}

{/strip}
{block name="tabView"}
	<a name="scrolldown"></a>		
	<div class="focal shaded">

    <a id="myclasses" class="{if $isInMyClasses}ms_on{else}ms_off{/if}" onclick="toggleMyClasses(this, '{$classId} {$term}')"></a>
    <h2>{$className}: {$classTitle}</h2>
    <p class="address">{$term}{if strlen($classUrl)} | <a href="{$classUrl}" target="_new">Course Website</a>{/if}</p>

    {include file="findInclude:common/tabs.tpl" tabBodies=$tabBodies}
  </div>
{/block}

{include file="findInclude:common/footer.tpl"}
