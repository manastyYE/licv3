<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقرير</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        @media print {
            .header,
            .table-container {

                width: 100%;
                top: 0;
                z-index: 1000;
            }

            .header {
                background-color: white;
                text-align: center;
            }

            .table-container {
                top: 60mm; /* تحديد ارتفاع رأس الصفحة */
            }

            table {
                page-break-before: always;
            }
        }

        .header,
        .table-container {

            background-color: white;
        }

        .header img {
            width: 150px;
        }

        .table-container {
            max-height: calc(100vh - 60px); /* احسب الارتفاع القصوى باستثناء رأس الصفحة */
            
        }

        table {
            border-color: black;
            border: 1px solid;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        thead {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
            z-index: 1;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }


    </style>
</head>

<body dir="rtl">
    <div class="header">
        <div class="row text-center mt-4 mb-2">
            <div class="col">
                <img src="{{asset('report/الحمهورية اليمنية.png')}}" alt="الجمهورية اليمنية">
                <h4 class="mt-2">أمانة العاصمة</h4>
                <h5 class="">مديرية الوحدة</h5>
                <h6>مكتب الاشغال</h6>
            </div>
            <div class="col">
                <img src="{{asset('report/بسم الله.png')}}" alt="بسم الله ">
                <br>
                <img src="{{asset('report/yemen.png')}}" alt="yemen" width="150">
                <div>
                    <h2>المنشاءات التي تم ترخيصها الى تاريخ</h2>
                </div>
            </div>
            <div class="col d-flex justify-content-center flex-column">
                <h4>ادارة النظم والمعلومات</h4>
                <h4>النظام الالي</h4>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-bordered border-dark">
            <thead>
                <tr class="table-warning text-center">
                    <!-- هنا تضيف رأس الجدول -->
                    <th>
                        #
                    </th>
                    <th>
                        الرقم الالي
                    </th>
                    <th>
                        اسم النشاط
                    </th>
                    <th>
                        اسم المالك
                    </th>
                    <th>
                        دعاية واعلان
                    </th>
                    <th>
                        رقم السند
                    </th>
                    <th>
                        التاريخ
                    </th>
                    <th>
                        محلية
                    </th>
                    <th>
                        رقم السند
                    </th>
                    <th>
                        التاريخ
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @forelse ($clips as $clip )
                <tr class="">
                    <td>
                        {{ $i++ }}
                    </td>

                    <td>
                        {{ $clip->id }}
                    </td>
                    <td>
                        {{ $clip->org->org_name }}
                    </td>
                    <td>
                        {{ $clip->org->owner_name }}
                    </td>
                    <td>
                        {{ $clip->total_ad + $clip->clean_pay + $clip->clean }}
                    </td>
                    <td>
                        {{ $clip->ad_reseve }}
                    </td>
                    <td>
                        {{ $clip->ad_reseve_date }}
                    </td>
                    <td>
                        {{ $clip->local_fee}}
                    </td>
                    <td>
                        {{ $clip->local_reseve }}
                    </td>
                    <td>
                        {{ $clip->local_reseve_date}}
                    </td>

                </tr>
                @empty

                @endforelse

            </tbody>
        </table>
    </div>

    <!-- Include your footer content here -->

    <!-- Include your Bootstrap and other scripts here -->
</body>

</html>
