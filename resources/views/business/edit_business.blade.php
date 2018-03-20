@extends('layouts.main')
@section('content')

  <div class="card-body">
    <span style="color:#0285CC ; font-weight:bold ; font-size:large">Menu Edit Usaha {{$menu->status}}</span><br>
    <span style="color:#27607F; font-size:small">Backind Administrator</span>
    <hr>
  </div>
  <div class="container-fluid">
    <div class="col-lg">
      <div class="card mb-3">
        <div class="card-header" style="font-size: small">
          <i class="fa fa-paperclip"></i>
          Edit Data Usaha
        </div>
        <!--Form Register-->
        <div class="card-body" style="font-size: small">
          <form method="POST" action="{{route ('updateBusiness',['id'=>$business_details, 'id_menu' => $menu->id_menu])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">

            </div>
            <div class="form-group {{ $errors->has('Business name') ? ' has-error' : '' }}">
              <table>
                <tr>
                  <td>
                    <label style="font-size: small">Pengelola</label>
                  </td>
                  <td><label style="font-size: small"> : </label></td>
                  <td><label style="font-size: small">{{ Auth::user()->name }}</label></td>
                </tr>

                <tr>
                  <td>
                    <label style="font-size: small">Logo Usaha</label>
                  </td>
                  <td>
                    <label style="font-size: small"> : </label>
                  </td>
                  <td>
                    {{-- <input type="file" name="bus_pict[]" multiple></input> --}}
                    <input type="file" name="bus_pict"></input>
                  </td>

                </tr>
              </table>
              <hr>
            </div>
            <div class="form-group {{ $errors->has('Business name') ? ' has-error' : '' }}">
              <label for="name" style="font-size: small">Nama Bisnis</label>
              <input style="font-size: small" id="name" type="text" class="form-control" name="name" value="{{$business_details->business_name}}" placeholder="Masukkan nama bisnis anda"required autofocus>
              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('Business email') ? ' has-error' : '' }}">
              <label style="font-size: small" for="email">Email Bisnis</label>
              <input style="font-size: small" id="email" type="email" class="form-control" name="email" value="{{$business_details->business_email}}" placeholder="Masukkan email bisnis anda" required>

              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group gllpLatlonPicker">
              <div class="form-group" style="font-size: small">
                <label>Alamat</label>
                <input style="font-size: small" type="text" class="form-control gllpSearchField" value="{{$business_details->business_address}}" name="address" placeholder="Masukkan alamat">
                <input style="font-size: small" type="button" class="gllpSearchButton" value="Cari Koordinat">
              </div>

              <div class="gllpMap" style="font-size: small">Google Maps</div>

              <input type="hidden" class="gllpZoom" value="3"/>
              <div class="form-group col-lg-6"></div>
              <div class="form-group col-lg-6" style="font-size: small">
                <label>Latitude</label>
                <input readonly style="font-size: small" value="{{$business_details->business_lat}}" type="text" id="latShow" name="lat" class="gllpLatitude form-control" placeholder="Latitude" required/>
              </div>
              <div class="form-group col-lg-6" style="font-size: small">
                <label>Langitude</label>
                <input readonly style="font-size: small" value="{{$business_details->business_lang}}" type="text" id="lngShow" name="lang" class="gllpLongitude form-control" placeholder="Longitude" required/>
              </div>
            </div>
            <div class="form-group{{ $errors->has('Phone number') ? ' has-error' : '' }}">
              <label style="font-size: small" for="phone_number">Nomor Telefon</label>
              <input style="font-size: small" id="phone_number" type="number" value="{{$business_details->business_phone}}" class="form-control" name="phone" value="{{ old('phone_number') }}" placeholder="Masukkan nomor telefon bisnis anda "required autofocus>
              @if ($errors->has('phone'))
                <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <table style="font-size: small">
                <tr>
                  <td><label>Jam Buka</label></td>
                  <td><label>:</label></td>
                  <td>
                    <input style="font-size: small" id="open" value="{{$business_details->business_open_time}}" type="time" class="form-control" name="open" value="" placeholder="Waktu Operasional" required autofocus>
                  </td>
                  <td><label>Jam Tutup</label></td>
                  <td><label>:</label></td>
                  <td>
                    <input style="font-size: small" id="close" type="time" value="{{$business_details->business_close_time}}" class="form-control" name="close" value="" placeholder="Waktu Operasional" required autofocus>
                  </td>
                </tr>
              </table>
            </div>
            <div class="form-group{{ $errors->has('Range price') ? ' has-error' : '' }}">
              <label style="font-size: small" for="price">Harga Tiket</label>
              <input style="font-size: small" id="price" type="number" value="{{$business_details->business_price}}" class="form-control" name="price" value="" placeholder="(IDR) rentang harga tiket" required autofocus>

              @if ($errors->has('price'))
                <span class="help-block">
                  <strong>{{ $errors->first('price') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="desc" style="font-size: small">Deskripsi Bisnis</label>
              <textarea  rows="15"style="font-size: small" id="desc" type="text" class="form-control" name="desc" placeholder="Masukkan Deskripsi Bisnis ( maksimal 250 huruf )"required autofocus>{{$business_details->business_desc}}</textarea>
            </div>

            @if($menu->id_menu == 2 )
              <div class="form-group">
                <label style="font-size: small" >Status Homestay : </label>
                <table>
                  <tr>
                    <td>
                      <input type="radio" name="condition" value="1">Tersedia</input>
                    </td>
                    <td>
                      <input type="radio" name="condition" value="2">Tidak Tersedia</input>
                    </td>
                  </tr>
                </table>

              </div>
            @endif
            <br>
            <div>
              <button type="submit" class="btn btn-primary btn-block" style="font-size:small">
                Ubah data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
@endsection
