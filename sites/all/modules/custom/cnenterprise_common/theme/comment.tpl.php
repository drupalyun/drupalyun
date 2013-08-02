<li>    
<div class="img"><a  rel="nofollow" href="<?php print url('user/' . $account->uid) ?>" uid="<?php print $account->uid ?>"><img width="50" height="50" title="<?php print $account->name  ?>" alt="<?php print $account->name  ?>" src="<?php print $account->avatar_url ?>"></a>
</div>    
<div class="content">     
<div class="name"><a rel="nofollow" href="<?php print url('user/' . $account->uid) ?>" target="_blank" uid="<?php print$account->uid ?>"><?php print$account->name ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?php print t('@time ago', array('@time' => format_interval(REQUEST_TIME - $comment->created))) ?></span>
</div>     
<p><?php print $comment->comment_body['und'][0]['value'] ?></p>    
<div class="action"><a href="javascript:void(0);" data-name="<?php print $account->name ?>"  class="ext-reply">回复</a>
</div>    
</div>    
<div class="clear">
</div>  
</li>