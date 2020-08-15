<div class="modal fade" id="edit{{$products->id}}" >
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('update_product')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label >Add Product Name:</label>
                        <input type="text" class="form-control"   value="{{$products->product_name}}" name="product_name">
                        <input type="hidden" class="form-control"   value="{{$products->id}}" name="id">
                    </div>

                    <div class="form-group">
                        <label >Select Category Name:</label>
                        <select name="cat_id" class="form-control">
                            <option value="{{$products->cat_id}}">{{'previous:'.$products->cat_nam}}</option>
                            <option >---SELECT CATEGORY Name---</option>
                            @foreach($category as $categories)
                                <option value="{{$categories->id}}">{{$categories->cat_nam}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Select Brand Name:</label>
                        <select name="Brand_id" class="form-control">

                            <option value="{{$products->Brand_id}}">{{'previous:'.$products->brand_name}}</option>

                            <option >---SELECT Brand Name---</option>
                            @foreach($brand as $brands)
                                <option value="{{$brands->id}}">{{$brands->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Add Product Price:</label>
                        <input type="text" class="form-control"   value="{{$products->product_price}}"  name="product_price">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Product Short Description:</label>
                        <textarea type="text" class="form-control"   name="short_description">{{$products->short_description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Product long Description:</label>
                        <textarea type="text" class="form-control"    name="long_description">{!!$products->long_description!!}</textarea>
                    </div>

                    <div class="form-group">
                        <label >Product Size:</label>
                        <select name="product_size" class="form-control">
                            <option value="{{'previous:'.$products->product_size}}">{{'previous:'.$products->product_size}}</option>

                            <option>---SELECT PRODUCT SIZE--- </option>
                            <option value="xl">XL</option>
                            <option value="l">L</option>
                            <option value="m">M</option>
                            <option value="s">S</option>


                        </select>
                    </div>




                    <div class="form-group">
                        <label > Product Quantity:</label>
                        <input type="number" class="form-control"   value="{{$products->Product_qty}}"  name="Product_qty">
                    </div>
                    <div class="form-group">
                        <label >Product image:</label>
                        <input type="file" class="form-control-file"   name="main_image">


                        <div class="form-group">
                            <label for="exampleInputPassword1"> prev. Product image: </label>
                            <img src="{{asset($products->main_image)}}" width="100px" height="120">
                        </div>
                    </div>
                    <hr>



                    <div class="form-group">
                        <label >Image Gallery:</label>
                        <input type="file" class="form-control-file"  multiple  name="imagefile[]">

                        <div class="form-group">
                            <label > prev. Image Gallery: </label>
                            @foreach(json_decode($products->imagefile) as $img)
                                <img src="{{asset($img)}}" width="100px" height="120px">
                            @endforeach
                        </div>
                    </div>


                    <div class="form-group">
                        <label  >Publication Status:</label>
                        <div class="col-md-9 radio ">
                            <input type="radio" required name="status" value="1" {{$products->status==1?"Checked":""}} >Published
                            <input type="radio" required  name="status"  value="0" {{$products->status==0?"Checked":""}}>Un-Published
                        </div>


                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="btn" value="Update products" >
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
