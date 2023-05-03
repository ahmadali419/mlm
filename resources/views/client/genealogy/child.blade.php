<?php
$levelStop=13;
$startLevel++;
?>
<ul>
  <?php
  $b=0;
  $perb=6;
  $total=count($childs);
  ?>
  @foreach($childs as $child)
  <li>
    <a href="{{ route('genealogy.show',$child->id) }}" style="color: blue">
      <div class="container-fluid">
        <div class="text-center" >
          <i class="fa fa-user fa-2x user-icon"></i>
        </div>
        <div class="text-center">
          {{ $child->name}}
        </div>
        
        
      </div>
    </a>
    <p class="detail-genealogy" onclick="redirectToDeposit({{ $child->id}})">Deposit</p>
    <?php
    $childUsers=members($child->id);
    ?>
    @if(count($childUsers)>0)
    @if($startLevel==$levelStop)
    @else
      @include('client.genealogy.child',['childs' => $childUsers,'myReferl'=>$myReferl])
    @endif
    @endif
    <?php
    $b++;
    ?>
  </li>
  @endforeach
  @for(;$b<$perb;$b++)
  @include('client.genealogy.null',['user' => $myReferl])
  @endfor
</ul>