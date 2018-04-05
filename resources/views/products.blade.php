@include('header')

<!-- start main1 -->
<div class="main_bg1">
<div class="wrap">	
	
</div>
</div>
<!-- start main -->
<div class="main_bg">
<div class="wrap">	
	<div class="main">
		<!-- start grids_of_3 -->
		@foreach($data as $item)
				<div class='grid1_of_3'>
				<a href="#">
					<img src="#" alt=""/>
					<h3>{{$item->name}}</h3>
					<div class="price">
						<h4>Rp. {{$item->price}} <span>DETAILS</span></h4>
					</div>
					<span class="b_btm"></span>
				</a>
				</div>
		@endforeach
		<!-- end grids_of_3 -->
	</div>
</div>
</div>	
<!-- start footer -->
@include('footer')