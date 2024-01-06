<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
            font-weight: 700;
        }
        .hop{
            margin: 10em;
        }
    </style>
</head>

<body dir="rtl">
    <div class="container">
        <div style="margin-right: 6mm;">
            <div style="margin-top: 53mm;">
                {{auth()->guard('admin')->user()->directorate->name}}
            </div>
            <div>
                الامانة
            </div>
        </div>
        <div style="margin-top: 13.5mm;" class="row">
            <div class="col">
                <div class="row" >


                    <div class="col-9">
                        {{ $clip->org->owner_name }}
                    </div>
                    <div class="col">
                        <span style="margin-right: 2mm;">
                            {{ $clip->org->card_number }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        {{ $clip->org->card_type }}
                    </div>
                    <div class="col-5" >
                        <span style="margin-right: 3.5mm;">

                        </span>
                    </div>
                    <div class="col">
                        {{ $clip->org->street->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span style="margin-right: -1.5mm;">
                            {{ $clip->org->owner_phone }}
                        </span>
                    </div>
                    <div class="col">
                        {{ $clip->org->org_type->office->name}}
                    </div>
                    <div class="col">
                        {{ $clip->org->street->hood_unit->hood->name}}
                    </div>
                </div>
                <div class="row" style="margin-right: 0.5mm;margin-top: 1mm;">
                    <div class="col">

                    </div>
                    <div class="col">
                        {{ $clip->org->hood_unit->no }}
                    </div>
                    <div class="col">
                        {{ $clip->org->org_type->name}}
                    </div>
                </div>
                <div class="row" style="margin-top: 1mm;">
                    <div class="col">
                        <span style="margin-right: 4mm;">
                            {{ $clip->org->building_type->name}}
                        </span>
                    </div>
                    <div class="col">
                        {{-- اسم المالك --}}
                    </div>
                    <div class="col">
                        <span style="margin-right: 20mm;">
                            {{-- عمارة --}}
                        </span>
                    </div>
                </div>
                <div class="row" style="margin-top: 15mm;margin-right: 1mm;">
                    <div class="col">
                        <span style="margin-right: 3mm;">
                            {{ $clip->org->org_name }}
                        </span>
                    </div>
                    <div class="col">
                        <span style="margin-right: 5.5mm;">
                            {{ $clip->org->org_name }}
                        </span>
                    </div>
                </div>
                <div class="row" style="margin-right: 1.5mm;">
                    <div class="col">
                        <span style="margin-right: 6.5mm;">
                            {{ $clip->infront_count}}
                        </span>
                    </div>
                    <div class="col">
                        {{$clip->sideof_count}}
                    </div>
                    <div class="col">
                        <span style="margin-right: 5mm;">
                            {{ $clip->infront_count + $clip->sideof_count + $clip->roof_count +$clip->wall_count + $clip->glass_stickers + $clip->door_stickers }}
                        </span>
                    </div>
                </div>
                <div class="row" style="margin-right: 1.5mm;">
                    <div class="col">
                        <span style="margin-right: 6.5mm;">
                            {{ $clip->org->id}}-{{$clip->id}}
                        </span>
                    </div>
                    <div class="col">
                        <span style="margin-right: 11mm;">
                            {{$clip->org->id}}
                        </span>
                    </div>
                    <div class="col">
                        <span style="margin-right: 7mm;">
                            {{ $clip->org->id}}-{{$clip->id}}
                        </span>
                    </div>
                </div>
                <div class="row" style="margin-right: 1.6mm;margin-top: 1mm;">
                    <div class="col">
                        <span style="margin-right: 9.5mm;">
                            {{-- {{$date->format('Y-m-d')}} --}}
                        </span>
                    </div>
                    <div class="col">

                    </div>
                </div>
                <div class="row" style="margin-right: 16mm;">
                    <div class="col">
                        <span style="margin-right: 3mm;">
                            {{$date->format('Y-m-d')}}
                        </span>
                    </div>
                    <div class="col">
                        <span style="margin-right: 7mm;">
                            31 12 {{$date->format('y')}}
                        </span>
                    </div>
                    <div class="col">

                    </div>
                </div>


            </div>
            <div class="col">

            </div>
        </div>
    </div>


</body>

</html>
