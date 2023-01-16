<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
</head>
<body>
    <h2>THÔNG TIN CỬA HÀNG</h2>
    <p>Chi nhánh: {{ $shop_info->name }}</p>
    <p>Sản phẩm cửa hàng:</p>

        <b>{!! $shop_info->products->implode('name','<br>')!!} </b>
        <br>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Thêm SP kinh doanh</button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Xoa SP</button>

{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Shop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('shop.post')}}" method="POST">
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên shop</label>
            <input type="text" name="name" id="name_shop" class="form-control" id="recipient-name">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div> --}}


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm SP cho Shop</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('shop.add_post', $shop_info->id) }}" method="POST">
          @csrf
            <div class="form-group">
                <select class="selectpicker" name="name[]" multiple data-live-search="true">
                    @foreach ($product as $item )
                        <option value="{{ $item->id }}"
                            @foreach ($product_checked as $checked)
                                @if ($checked->id == $item->id)
                                    selected disabled
                                @endif
                            @endforeach >
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

{{-- {{ $product_checked }} --}}
{{-- @foreach ($product_checked as $item )
  {{ $item->name }}
@endforeach --}}
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('shop.delete_post', $shop_info->id) }}" method="POST">
          @csrf
            {{-- <input type="" value="{{ $shop_info->id }}" name="name" > --}}
            <div class="form-group">
                {{-- <select class="selectpicker" name="name[]" multiple data-live-search="true">
                    @foreach ($product as $item )
                        <option value="{{ $item->id }}">
                        @foreach ($product_checked as $checked)
                            @if ($checked->id == $item->id)
                                {{'selected="selected"'}}
                            @endif
                        @endforeach
                        {{ $item->name }}</option>
                    @endforeach
                </select> --}}
                <select class="selectpicker" name="name[]" multiple data-live-search="true">
                    @foreach ($product_checked as $item )
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Xóa</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
{{-- <script>
    function getDataRadio(myRadio)
    {

        var idShop = myRadio.value;
        console.log(myRadio.value);
    }
        // $('select').selectpicker();
</script> --}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>
</html>
