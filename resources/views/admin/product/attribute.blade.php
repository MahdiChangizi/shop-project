@extends('admin.layouts.master')

@section('content')
    @if (Session::has('alert-success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ Session::get('alert-success') }}</li>
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">ویژگی ها</h5>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام ویژگی</th>
                        <th>مقدار ویژگی</th>
                    </tr>
                </thead>

                <tbody>
                        <tr>
                            <th>{{ $product->id }}</th>

                            <td>
                                @foreach($product->attributes->pluck('name') as $name)
                                    <li style="font-size: 15px">{{ $name }}</li>
                                    <hr>
                                @endforeach
                            </td>

                            {{-- <td>
                                @foreach($product->attributes as $attribute)
                                    @foreach($attribute->values as $value)
                                        <p style="font-size: 15px"> {{ $value->value }} </p>
                                    @endforeach
                                @endforeach
                            </td> --}}

                            <td>
                                @foreach($product->attributes as $attribute)
                                    @foreach($attribute->values as $value)
                                        @if ($attribute->id == $value->attribute_id)
                                            <li style="font-size: 15px"> {{ $value->value }} </li>
                                        <hr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>




                        </tr>
                </tbody>
            </table>

        </div>
    </div>


@endsection
