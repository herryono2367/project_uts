@extends('admin-theme._master') 

@section('judul', 'update data')

@section('isi')


<div class="row mt-4">
    <div class="col-10">
        <div class="card-header">
            update data
            <a href="{{ url ('customer')}}"> 
           
            </a>
              </div>
                  <div class="card-body" >
                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form action="{{route('customer.update', $customer->id)}}" method="post" >
                      @method('PATCH')
                      @csrf
                      <div class="form-group">
                          <label>nama</label>
                          <input type="text" name="nama"class="form-control" value="{{$customer->nama}}">

                        <div class="form-group">
                          <label >kode</label>
                          <input type="text" name="kode" class="form-control" value="{{$customer->kode}}" > 
                        </div>

                        <div class="form-group">
                          <label >harga</label>
                          <input type="text" name="harga" class="form-control" value="{{$customer->harga}}">
                        </div>
                        <div class="form-group">
                          <label >merek</label>
                          <input type="text" name="merek" class="form-control" value="{{$customer->merek}}">
                          </div>
                          <div class="form-group">
                          <label >warna</label>
                          <input type="text" name="warna" class="form-control" value="{{$customer->warna}}">
                          </div>
                          <div class="form-group">
                          <label >tipe</label>
                          <input type="text" name="tipe" class="form-control" value="{{$customer->tipe}}">
                          </div>
                      <input type="submit" class="btn btn-primary" name="submit" value="save ">
                    <a class="btn btn-warning float-right"
                    href="{{ url ('customer') }}">
                    <i class="fas fa-backward"></i></i> cancel </a>
                    </div>

              </form>
         
</div>
</div>
</div>
</div>
@endsection
