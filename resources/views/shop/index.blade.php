@extends('layouts.master')

@section('title')
    stripe-cart
@endsection

@section('content')
<div class="row">

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="https://d30a6s96kk7rhm.cloudfront.net/original/readings/978/075/156/9780751565355.jpg" alt="" class="img-responsive">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p class="description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
        Soluta libero, magnam veritatis, eos fuga magni officia veniam quam 
        exercitationem molestias saepe natus incidunt nemo delectus neque pariatur tenetur. 
        Quos, accusantium!</p>
        <div class="clearfix">
            <div class="pull-left price">12$</div>
            <a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection