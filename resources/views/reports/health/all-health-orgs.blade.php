<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> كل منشأت مكتب الصحة </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            /* Add any other styles you need for your content */
        }

        @media print {

            table {
                page-break-after: always;
            }


            .cloned-header {
                position: sticky;
                top: 0;
                left: 0;
                right: 0;
                padding: 10px;
                text-align: center;
                border-bottom: 1px solid #ccc;
            }

            table {
                position: relative;
                top=5cm;
            }
        }
    </style>
</head>

<body dir="rtl">
    <div class="print-header">
        <!-- Your header content goes here -->
        <div class="row header text-center mt-4 mb-2">
            <div class="col">
                <img src="{{ asset('report/الحمهورية اليمنية.png') }}" width="150" alt="الجمهورية اليمنية">
                <h4 class="mt-2">
                    أمانة العاصمة
                </h4>
                <h5 class="">
                    مديرية الوحدة
                </h5>
                <h6>
                    مكتب الصحة
                </h6>
            </div>
            <div class="col">
                <img src="{{ asset('report/بسم الله.png') }}" width="150" alt="بسم الله ">
                <br>

                <img src="{{ asset('report/yemen.png') }}" alt="yemen" width="150">

            </div>
            <div class="col d-flex justify-content-center flex-column">
                <h4>
                    ادارة النظم والمعلومات
                </h4>
                <h4>
                    النظام الالي
                </h4>
            </div>
        </div>

    </div>
    <div>
        <?php $page = 1; ?>

        <p>
            صفحة رقم {{ $page++ }}
        </p>
        <!-- Rest of your content -->
        <table class="table table-bordered border-dark ">
            <thead>



                <tr class="table-warning text-center">

                    <!-- هنا تضيف رأس الجدول -->
                    <th>#</th>
                    <th>رقم المنشأة</th>
                    <th>اسم النشاط</th>
                    <th>اسم المالك</th>
                    <th>رقم المالك</th>
                    <th>الشارع</th>

                    <th>تاريخ الاضافة</th>
                </tr>
            </thead>
            <tbody class="print-content">
                <?php $i = 1;

                ?>
                @forelse ($health as $h)
                    <tr class="">
                        <td>{{ $i++ }}</td>
                        <td>{{ $h->id }}</td>
                        <td>{{ $h->org_name }}</td>
                        <td>{{ $h->owner_name }}</td>
                        <td>{{ $h->owner_phone }}</td>

                        <td>{{ $h->street->name }}</td>
                        <td>{{ $h->start_date }}</td>

                    </tr>
                    @if ($i % 18 == 1)
            </tbody>
        </table>

        <div class="page-break"></div>
        <p>
            صفحة رقم {{ $page++ }}
        </p>
        <table class="table table-bordered border-dark tb-page ">
            <thead>



                <tr class="table-warning text-center">

                    <!-- هنا تضيف رأس الجدول -->
                    <th>#</th>
                    <th>رقم المنشأة</th>
                    <th>اسم النشاط</th>
                    <th>اسم المالك</th>
                    <th>رقم المالك</th>
                    <th>الشارع</th>

                    <th>تاريخ الاضافة</th>
                </tr>
            </thead>
            <tbody class="print-content">
                @endif

                <!-- Page break -->


                <!-- More content -->

                <!-- Page break -->


                <!-- More content -->

                <!-- Add more page breaks as needed -->



            @empty
                @endforelse
                

            </tbody>
        </table>
    </div>
    <script>
        function cloneHeaderOnPrint() {
            const originalHeader = document.querySelector('.print-header');

            // Clone the header
            const clonedHeader = originalHeader.cloneNode(true);
            clonedHeader.classList.add('cloned-header');

            // Insert the cloned header before each page break
            const pageBreaks = document.querySelectorAll('.page-break');
            pageBreaks.forEach(pageBreak => {
                pageBreak.insertAdjacentElement('beforebegin', clonedHeader.cloneNode(true));
            });
        }

        // Attach the function to the print event
        window.onbeforeprint = cloneHeaderOnPrint;
    </script>

    <!-- Content with page breaks -->

</body>

</html>
