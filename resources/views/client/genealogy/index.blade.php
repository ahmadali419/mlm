@extends('client.master')
@section('content')
<style type="text/css">
    
/*#region Organizational Chart*/

.genealogy * {
margin: 0; padding: 0;
}
.genealogy ul {
padding-top: 20px; position: relative;
-transition: all 0.5s;
-webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
display: flex;
      
}
.genealogy li {
float: left; text-align: center;
list-style-type: none;
position: relative;
padding: 20px 5px 0 5px;
-transition: all 0.5s;
-webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
}
/*We will use ::before and ::after to draw the connectors*/
.genealogy li::before, .genealogy li::after{
content: '';
position: absolute; top: 0; right: 50%;
border-top: 2px solid #696969;
width: 50%; height: 20px;
}
.genealogy li::after{
right: auto; left: 50%;
border-left: 2px solid #696969;
}
/*We need to remove left-right connectors from elements without
any siblings*/
.genealogy li:only-child::after, .genealogy li:only-child::before {
display: none;
}
/*Remove space from the top of single children*/
.genealogy li:only-child{ padding-top: 0;}
/*Remove left connector from first child and
right connector from last child*/
.genealogy li:first-child::before, .genealogy li:last-child::after{
border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.genealogy li:last-child::before{
border-right: 2px solid #696969;
border-radius: 0 5px 0 0;
-webkit-border-radius: 0 5px 0 0;
-moz-border-radius: 0 5px 0 0;
}
.genealogy li:first-child::after{
border-radius: 5px 0 0 0;
-webkit-border-radius: 5px 0 0 0;
-moz-border-radius: 5px 0 0 0;
}
/*Time to add downward connectors from parents*/
.genealogy ul ul::before{
content: '';
position: absolute; top: 0; left: 50%;
border-left: 2px solid #696969;
width: 0; height: 20px;
}
.genealogy li a{
height: 50px;
width: 65px!important;
padding: 2px 6px;
text-decoration: none;
background-color: white;
color: #8b8b8b;
font-family: arial, verdana, tahoma;
font-size: 12px;
display: inline-block;
box-shadow: 0 1px 2px rgba(0,0,0,0.1);
-transition: all 0.5s;
-webkit-transition: all 0.5s;
-moz-transition: all 0.5s;
}
/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.genealogy li a:hover, .genealogy li a:hover+ul li a {
background: #cbcbcb; color: #000;
}
/*Connector styles on hover*/
.genealogy li a:hover+ul li::after,
.genealogy li a:hover+ul li::before,
.genealogy li a:hover+ul::before,
.genealogy li a:hover+ul ul::before{
border-color:  #94a0b4;
}
/*#endregion*/
.genealogy > ul > li > ul > li > a {
width: auto;
}
.genealogy > ul > li > a {
width: auto;
}
.genealogy li li li a {
width: auto;
}
.user-icon{
	font-size: 15px;
}
.detail-genealogy{
    cursor: pointer;
}
@media only screen and (max-width: 600px) {
  .genealogy ul{
      display: flex;
     
  }

  .genealogy li span{
      padding: 5px !important;
      height: 45px !important;
      width: 45px  !important;
  }

  .genealogy {
      font-size: 8px !important;
  }
  .genealogy li {
      padding: 20px 2px 0px 2px !important;
  }
}
</style>
<div class="app-content content ">
	<div class="content-body">
	    <div class="col-md-12">
    <div class="genealogy text-center" style="overflow: auto;">
        <ul>
            <li>
                <a href="#" style="color: blue">
                    <div class="container-fluid">
                        <div class="text-center" >
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                        <div class="text-center">
                            {{ $user->name }}
                        </div>
                    </div>
                </a>
                
                <ul>
                    <?php
                    $i=0;
                    $per=6;
                      $total=count($users);
                      $startLevel=1;
                    ?>
                    @if(count($users)>0)
                    @foreach($users as $uservalue)
                    <li>
                        <a href="{{ route('genealogy.show',$uservalue->id) }}" style="color: blue">
                            <div class="container-fluid">
                                <div class="text-center" >
                                    <i class="fa fa-user fa-2x user-icon"></i>
                                </div>
                                <div class="">
                                    {{ $uservalue->name}} 
                                </div>
                            </div>
                        </a>
                        <p class="detail-genealogy" onclick="redirectToDeposit({{ $uservalue->id}})">Deposit</p>
                        <?php
                        
                        $childUsers=members($uservalue->id);
                        $c=0;
                        ?>
                        @if(count($childUsers)>0)
                        @include('client.genealogy.child',['childs' => $childUsers,'myReferl'=>$uservalue->id])
                        @else
                       
                        {{-- @include('layouts.matrix.allNull',['user' => $uservalue->user_id]) --}}
                       
                        @endif

                    </li>
                </li>
                <?php
                $i++;
                ?>
                @endforeach
                @for(;$i<$per;$i++)
                @include('client.genealogy.null',['user' => $user->id])
                @endfor
                @else
                <?php $a=1; ?>
                @for(;$a<=$per;$a++)
                @include('client.genealogy.null',['user' => $user->id])
                @endfor
                @endif
            </ul>
        </li>
    </ul>
</div>
</div>
    </div>
<div>
@endsection

<script>
    function redirectToDeposit(id){
        window.location.href = "/deposits/user/"+id;
    }
</script>