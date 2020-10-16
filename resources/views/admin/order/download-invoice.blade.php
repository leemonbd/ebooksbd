<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title> invoice </title>
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">


    <style>
        @import url('https://fonts.maateen.me/solaiman-lipi/font.css');


        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family:  'SolaimanLipi','Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        body {
            font-family: 'SolaimanLipi', Arial, sans-serif !important;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma,  'SolaimanLipi','Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table >
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td align="center">
                            <img src="{{asset('/')}}admin/assets/images/logo.png" style="width:30%; max-width:100px;"><br>
                            <p style="font-size: large"><b>Invoice</b><br></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>

                    <tr>
                        <td>
                            <b>Invoice From</b><br>
                            Islamic Pdf Book Bd<br>
                            limoninfoo@gmail.com
                        </td>

                        <td>
                            <b>Invoice To</b><br>
                            {{$orderDetailss->firstName.' '.$orderDetailss->lastName}}<br>
                            {{$orderDetailss->email}}<br>
                            <p>
                                <b>Issue Date: </b><br>
                                {{ \Carbon\Carbon::parse($orderDetailss->updated_at)->isoFormat('MMM Do, YYYY')}}
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>


        <tr class="heading">
            <td>
                Order No.
            </td>

            <td>
                Price
            </td>
        </tr>
        @foreach($orderDetails as $orderDetail)
        <tr class="item">
            <td>
                #{{$orderDetail->orderNumber}}
            </td>

            <td>
                Tk.00.00
            </td>
        </tr>
        @endforeach


        <tr>
            <td></td>

            <td>
                <p><b>Total:</b> Tk.00.00</p>
            </td>
        </tr>

        <tr  class="item">
            <td>
                Tax
            </td>

            <td>
                N/A
            </td>
        </tr>

        <tr  class="item">
            <td>
                Shipping Cost
            </td>

            <td>
                N/A
            </td>
        </tr>

        <tr>
            <td></td>

            <td>
                <p><b>Grand Total:</b> Tk.00.00</p>
            </td>
        </tr>

    </table>
</div>
</body>
</html>
