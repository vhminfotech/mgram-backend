<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">@yield('title')</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                @php 
                $count = count($header['breadcrumb']); 
                $temp = 1;
                @endphp 
                @foreach($header['breadcrumb'] as $key => $value)
                @php 
                $value = (empty($value)) ? 'javascript:;' : $value; @endphp
                @if($temp!=$count)
                <li class="breadcrumb-item">
                    <a href="{{ $value }}"> 
                        @if($temp == 1)
                        <i class="fa fa-dashboard">@endif</i> {{ $key }} 
                    </a>
                </li>
                @else
                <li class="breadcrumb-item active">{{ $key }}</li>
                @endif
                @php $temp = $temp+1; @endphp
                @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
