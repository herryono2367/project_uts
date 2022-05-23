@extends('admin-theme._master') 

@section('judul', 'Data Pelanggan')

@section('isi')


<div class="row mt-4">
    <div class="col-10">
        <div class="card-header">
            Data customer
            <a class="btn btn-primary float-right"
            href="{{ url ('customer/create')}}"> <i class="fas fa-plus-square"></i></i> tambah data </a></div>
            <div class="card-body">
                <table class="table table-bordered">
                     <thead>
                       <tr style="background-color: #00f5ff;">
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>KODE</th>
                            <th>HARGA</th>
                            <th>MEREK</th>
                            <th>WARNA</th>
                            <th>TYPE</th>
                            <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$customer->nama}}</td>
                            <td>{{$customer->kode}}</td>
                            <td>{{$customer->harga}}</td>
                            <td>{{$customer->merek}}</td>
                            <td>{{$customer->warna}}</td>
                            <td>{{$customer->tipe}}</td>
                            <td >
                                
                            <a href="{{url('customer/edit')}}/{{$customer->id}}" class="btn btn-warning">update</a>
                            </form> 
                           </td>
                           <td>
                           <form action="{{ url("customers/{$customer->id}")}}" method="post"  >
                               @csrf
                               @method('DELETE')
                               <button class="btn btn-danger">hapus</button>
                           </form> 
                           </td>
                        </tr>
                      @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


