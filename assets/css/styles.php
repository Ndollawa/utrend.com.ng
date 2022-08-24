<?php 
header("Content-type: text/css; charset:UTF-8");
include '../../backend/database.php';
$sql = "SELECT loader,theme_colour_one,theme_colour_two FROM general WHERE id =1"; 
$query = $database->query($sql);
$row = $database->fetch_array($query);
foreach($query as $key => $row) {
$theme_colour_one = $row["theme_colour_one"];
$theme_colour_two = $row["theme_colour_two"];
$loader = $row["loader"]; 
$bg_image = $row["background_image"];            
              }              



?>.container-fluid{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}.row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.col,.col-1,.col-10,.col-11,.col-12,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9,.col-auto,.col-lg,.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-auto,.col-md,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-auto,.col-sm,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-auto,.col-xl,.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-auto{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px}

.col{-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-auto{-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-1{-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-2{-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-3{-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-5{-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-7{-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-8{-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-9{-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-10{-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-11{-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-first{-ms-flex-order:-1;order:-1}.order-last{-ms-flex-order:13;order:13}.order-0{-ms-flex-order:0;order:0}.order-1{-ms-flex-order:1;order:1}.order-2{-ms-flex-order:2;order:2}.order-3{-ms-flex-order:3;order:3}.order-4{-ms-flex-order:4;order:4}.order-5{-ms-flex-order:5;order:5}.order-6{-ms-flex-order:6;order:6}.order-7{-ms-flex-order:7;order:7}.order-8{-ms-flex-order:8;order:8}.order-9{-ms-flex-order:9;order:9}.order-10{-ms-flex-order:10;order:10}.order-11{-ms-flex-order:11;order:11}.order-12{-ms-flex-order:12;order:12}.offset-1{margin-left:8.333333%}.offset-2{margin-left:16.666667%}.offset-3{margin-left:25%}.offset-4{margin-left:33.333333%}.offset-5{margin-left:41.666667%}.offset-6{margin-left:50%}.offset-7{margin-left:58.333333%}.offset-8{margin-left:66.666667%}.offset-9{margin-left:75%}.offset-10{margin-left:83.333333%}.offset-11{margin-left:91.666667%}@media (min-width:576px){.col-sm{-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-sm-auto{-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-sm-1{-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-sm-2{-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-sm-3{-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-sm-4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-sm-5{-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-sm-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-sm-7{-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-sm-8{-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-sm-9{-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-sm-10{-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-sm-11{-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-sm-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-sm-first{-ms-flex-order:-1;order:-1}.order-sm-last{-ms-flex-order:13;order:13}.order-sm-0{-ms-flex-order:0;order:0}.order-sm-1{-ms-flex-order:1;order:1}.order-sm-2{-ms-flex-order:2;order:2}.order-sm-3{-ms-flex-order:3;order:3}.order-sm-4{-ms-flex-order:4;order:4}.order-sm-5{-ms-flex-order:5;order:5}.order-sm-6{-ms-flex-order:6;order:6}.order-sm-7{-ms-flex-order:7;order:7}.order-sm-8{-ms-flex-order:8;order:8}.order-sm-9{-ms-flex-order:9;order:9}.order-sm-10{-ms-flex-order:10;order:10}.order-sm-11{-ms-flex-order:11;order:11}.order-sm-12{-ms-flex-order:12;order:12}.offset-sm-0{margin-left:0}.offset-sm-1{margin-left:8.333333%}.offset-sm-2{margin-left:16.666667%}.offset-sm-3{margin-left:25%}.offset-sm-4{margin-left:33.333333%}.offset-sm-5{margin-left:41.666667%}.offset-sm-6{margin-left:50%}.offset-sm-7{margin-left:58.333333%}.offset-sm-8{margin-left:66.666667%}.offset-sm-9{margin-left:75%}.offset-sm-10{margin-left:83.333333%}.offset-sm-11{margin-left:91.666667%}}@media (min-width:768px){.col-md{-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-md-auto{-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-md-1{-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-md-2{-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-md-3{-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-md-4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-md-5{-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-md-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-md-7{-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-md-8{-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-md-9{-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-md-10{-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-md-11{-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-md-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-md-first{-ms-flex-order:-1;order:-1}.order-md-last{-ms-flex-order:13;order:13}.order-md-0{-ms-flex-order:0;order:0}.order-md-1{-ms-flex-order:1;order:1}.order-md-2{-ms-flex-order:2;order:2}.order-md-3{-ms-flex-order:3;order:3}.order-md-4{-ms-flex-order:4;order:4}.order-md-5{-ms-flex-order:5;order:5}.order-md-6{-ms-flex-order:6;order:6}.order-md-7{-ms-flex-order:7;order:7}.order-md-8{-ms-flex-order:8;order:8}.order-md-9{-ms-flex-order:9;order:9}.order-md-10{-ms-flex-order:10;order:10}.order-md-11{-ms-flex-order:11;order:11}.order-md-12{-ms-flex-order:12;order:12}.offset-md-0{margin-left:0}.offset-md-1{margin-left:8.333333%}.offset-md-2{margin-left:16.666667%}.offset-md-3{margin-left:25%}.offset-md-4{margin-left:33.333333%}.offset-md-5{margin-left:41.666667%}.offset-md-6{margin-left:50%}.offset-md-7{margin-left:58.333333%}.offset-md-8{margin-left:66.666667%}.offset-md-9{margin-left:75%}.offset-md-10{margin-left:83.333333%}.offset-md-11{margin-left:91.666667%}}



@media (min-width:992px){.col-lg{-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-lg-auto{-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-lg-1{-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-lg-2{-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-lg-3{-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-lg-4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-lg-5{-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-lg-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-lg-7{-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-lg-8{-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-lg-9{-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-lg-10{-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-lg-11{-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-lg-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-lg-first{-ms-flex-order:-1;order:-1}.order-lg-last{-ms-flex-order:13;order:13}.order-lg-0{-ms-flex-order:0;order:0}.order-lg-1{-ms-flex-order:1;order:1}.order-lg-2{-ms-flex-order:2;order:2}.order-lg-3{-ms-flex-order:3;order:3}.order-lg-4{-ms-flex-order:4;order:4}.order-lg-5{-ms-flex-order:5;order:5}.order-lg-6{-ms-flex-order:6;order:6}.order-lg-7{-ms-flex-order:7;order:7}.order-lg-8{-ms-flex-order:8;order:8}.order-lg-9{-ms-flex-order:9;order:9}.order-lg-10{-ms-flex-order:10;order:10}.order-lg-11{-ms-flex-order:11;order:11}.order-lg-12{-ms-flex-order:12;order:12}.offset-lg-0{margin-left:0}.offset-lg-1{margin-left:8.333333%}.offset-lg-2{margin-left:16.666667%}.offset-lg-3{margin-left:25%}.offset-lg-4{margin-left:33.333333%}.offset-lg-5{margin-left:41.666667%}.offset-lg-6{margin-left:50%}.offset-lg-7{margin-left:58.333333%}.offset-lg-8{margin-left:66.666667%}.offset-lg-9{margin-left:75%}.offset-lg-10{margin-left:83.333333%}.offset-lg-11{margin-left:91.666667%}}@media (min-width:1200px){.col-xl{-ms-flex-preferred-size:0;flex-basis:0;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-xl-auto{-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-xl-1{-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-xl-2{-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-xl-3{-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-xl-4{-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-xl-5{-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-xl-6{-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-xl-7{-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-xl-8{-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-xl-9{-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-xl-10{-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-xl-11{-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-xl-12{-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-xl-first{-ms-flex-order:-1;order:-1}.order-xl-last{-ms-flex-order:13;order:13}.order-xl-0{-ms-flex-order:0;order:0}.order-xl-1{-ms-flex-order:1;order:1}.order-xl-2{-ms-flex-order:2;order:2}.order-xl-3{-ms-flex-order:3;order:3}.order-xl-4{-ms-flex-order:4;order:4}.order-xl-5{-ms-flex-order:5;order:5}.order-xl-6{-ms-flex-order:6;order:6}.order-xl-7{-ms-flex-order:7;order:7}.order-xl-8{-ms-flex-order:8;order:8}.order-xl-9{-ms-flex-order:9;order:9}.order-xl-10{-ms-flex-order:10;order:10}.order-xl-11{-ms-flex-order:11;order:11}.order-xl-12{-ms-flex-order:12;order:12}.offset-xl-0{margin-left:0}.offset-xl-1{margin-left:8.333333%}.offset-xl-2{margin-left:16.666667%}.offset-xl-3{margin-left:25%}.offset-xl-4{margin-left:33.333333%}.offset-xl-5{margin-left:41.666667%}.offset-xl-6{margin-left:50%}.offset-xl-7{margin-left:58.333333%}.offset-xl-8{margin-left:66.666667%}.offset-xl-9{margin-left:75%}.offset-xl-10{margin-left:83.333333%}.offset-xl-11{margin-left:91.666667%}}.table{width:100%;margin-bottom:1rem;background-color:transparent}.table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6}.table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6}.table tbody+tbody{border-top:2px solid #dee2e6}.table .table{background-color:#fff}.table-sm td,.table-sm th{padding:.3rem}.table-bordered{border:1px solid #dee2e6}.table-bordered td,.table-bordered th{border:1px solid #dee2e6}.table-bordered thead td,.table-bordered thead th{border-bottom-width:2px}.table-borderless tbody+tbody,.table-borderless td,.table-borderless th,.table-borderless thead th{border:0}.table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}.table-hover tbody tr:hover{background-color:rgba(0,0,0,.075)}.table-primary,.table-primary>td,.table-primary>th{background-color:#b8daff}.table-hover .table-primary:hover{background-color:#9fcdff}.table-hover .table-primary:hover>td,.table-hover .table-primary:hover>th{background-color:#9fcdff}.table-secondary,.table-secondary>td,.table-secondary>th{background-color:#d6d8db}.table-hover .table-secondary:hover{background-color:#c8cbcf}.table-hover .table-secondary:hover>td,.table-hover .table-secondary:hover>th{background-color:#c8cbcf}.table-success,.table-success>td,.table-success>th{background-color:#c3e6cb}.table-hover .table-success:hover{background-color:#b1dfbb}.table-hover .table-success:hover>td,.table-hover .table-success:hover>th{background-color:#b1dfbb}.table-info,.table-info>td,.table-info>th{background-color:#bee5eb}.table-hover .table-info:hover{background-color:#abdde5}.table-hover .table-info:hover>td,.table-hover .table-info:hover>th{background-color:#abdde5}.table-warning,.table-warning>td,.table-warning>th{background-color:#ffeeba}.table-hover .table-warning:hover{background-color:#ffe8a1}.table-hover .table-warning:hover>td,.table-hover .table-warning:hover>th{background-color:#ffe8a1}.table-danger,.table-danger>td,.table-danger>th{background-color:#f5c6cb}.table-hover .table-danger:hover{background-color:#f1b0b7}.table-hover .table-danger:hover>td,.table-hover .table-danger:hover>th{background-color:#f1b0b7}.table-light,.table-light>td,.table-light>th{background-color:#fdfdfe}.table-hover .table-light:hover{background-color:#ececf6}.table-hover .table-light:hover>td,.table-hover .table-light:hover>th{background-color:#ececf6}.table-dark,.table-dark>td,.table-dark>th{background-color:#c6c8ca}.table-hover .table-dark:hover{background-color:#b9bbbe}.table-hover .table-dark:hover>td,.table-hover .table-dark:hover>th{background-color:#b9bbbe}.table-active,.table-active>td,.table-active>th{background-color:rgba(0,0,0,.075)}.table-hover .table-active:hover{background-color:rgba(0,0,0,.075)}.table-hover .table-active:hover>td,.table-hover .table-active:hover>th{background-color:rgba(0,0,0,.075)}.table .thead-dark th{color:#fff;background-color:#212529;border-color:#32383e}.table .thead-light th{color:#495057;background-color:#e9ecef;border-color:#dee2e6}.table-dark{color:#fff;background-color:#212529}.table-dark td,.table-dark th,.table-dark thead th{border-color:#32383e}.table-dark.table-bordered{border:0}.table-dark.table-striped tbody tr:nth-of-type(odd){background-color:rgba(255,255,255,.05)}.table-dark.table-hover tbody tr:hover{background-color:rgba(255,255,255,.075)}@media (max-width:575.98px){.table-responsive-sm{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-sm>.table-bordered{border:0}}@media (max-width:767.98px){.table-responsive-md{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-md>.table-bordered{border:0}}@media (max-width:991.98px){.table-responsive-lg{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-lg>.table-bordered{border:0}}@media (max-width:1199.98px){.table-responsive-xl{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-xl>.table-bordered{border:0}}.table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive>.table-bordered{border:0}
.form-control{display:block;width:100%;height:calc(2.25rem + 2px);padding:.375rem .75rem;font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media screen and (prefers-reduced-motion:reduce){.form-control{transition:none}}.form-control::-ms-expand{background-color:transparent;border:0}.form-control:focus{color:#495057;background-color:#fff;border-color:#80bdff;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}.form-control::-webkit-input-placeholder{color:#6c757d;opacity:1}.form-control::-moz-placeholder{color:#6c757d;opacity:1}.form-control:-ms-input-placeholder{color:#6c757d;opacity:1}.form-control::-ms-input-placeholder{color:#6c757d;opacity:1}.form-control::placeholder{color:#6c757d;opacity:1}.form-control:disabled,.form-control[readonly]{background-color:#e9ecef;opacity:1}select.form-control:focus::-ms-value{color:#495057;background-color:#fff}.form-control-file,.form-control-range{display:block;width:100%}.col-form-label{padding-top:calc(.375rem + 1px);padding-bottom:calc(.375rem + 1px);margin-bottom:0;font-size:inherit;line-height:1.5}.col-form-label-lg{padding-top:calc(.5rem + 1px);padding-bottom:calc(.5rem + 1px);font-size:1.25rem;line-height:1.5}.col-form-label-sm{padding-top:calc(.25rem + 1px);padding-bottom:calc(.25rem + 1px);font-size:.875rem;line-height:1.5}.form-control-plaintext{display:block;width:100%;padding-top:.375rem;padding-bottom:.375rem;margin-bottom:0;line-height:1.5;color:#212529;background-color:transparent;border:solid transparent;border-width:1px 0}.form-control-plaintext.form-control-lg,.form-control-plaintext.form-control-sm{padding-right:0;padding-left:0}.form-control-sm{height:calc(1.8125rem + 2px);padding:.25rem .5rem;font-size:.875rem;line-height:1.5;border-radius:.2rem}.form-control-lg{height:calc(2.875rem + 2px);padding:.5rem 1rem;font-size:1.25rem;line-height:1.5;border-radius:.3rem}select.form-control[multiple],select.form-control[size]{height:auto}textarea.form-control{height:auto}.form-group{margin-bottom:1rem}.form-text{display:block;margin-top:.25rem}.form-row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-5px;margin-left:-5px}.form-row>.col,.form-row>[class*=col-]{padding-right:5px;padding-left:5px}.form-check{position:relative;display:block;padding-left:1.25rem}.form-check-input{position:absolute;margin-top:.3rem;margin-left:-1.25rem}.form-check-input:disabled~.form-check-label{color:#6c757d}.form-check-label{margin-bottom:0}.form-check-inline{display:-ms-inline-flexbox;display:inline-flex;-ms-flex-align:center;align-items:center;padding-left:0;margin-right:.75rem}.form-check-inline .form-check-input{position:static;margin-top:0;margin-right:.3125rem;margin-left:0}.valid-feedback{display:none;width:100%;margin-top:.25rem;font-size:80%;color:#28a745}.valid-tooltip{position:absolute;top:100%;z-index:5;display:none;max-width:100%;padding:.25rem .5rem;margin-top:.1rem;font-size:.875rem;line-height:1.5;color:#fff;background-color:rgba(40,167,69,.9);border-radius:.25rem}.custom-select.is-valid,.form-control.is-valid,.was-validated .custom-select:valid,.was-validated .form-control:valid{border-color:#28a745}.custom-select.is-valid:focus,.form-control.is-valid:focus,.was-validated .custom-select:valid:focus,.was-validated .form-control:valid:focus{border-color:#28a745;box-shadow:0 0 0 .2rem rgba(40,167,69,.25)}.custom-select.is-valid~.valid-feedback,.custom-select.is-valid~.valid-tooltip,.form-control.is-valid~.valid-feedback,.form-control.is-valid~.valid-tooltip,.was-validated .custom-select:valid~.valid-feedback,.was-validated .custom-select:valid~.valid-tooltip,.was-validated .form-control:valid~.valid-feedback,.was-validated .form-control:valid~.valid-tooltip{display:block}.form-control-file.is-valid~.valid-feedback,.form-control-file.is-valid~.valid-tooltip,.was-validated .form-control-file:valid~.valid-feedback,.was-validated .form-control-file:valid~.valid-tooltip{display:block}.form-check-input.is-valid~.form-check-label,.was-validated .form-check-input:valid~.form-check-label{color:#28a745}.form-check-input.is-valid~.valid-feedback,.form-check-input.is-valid~.valid-tooltip,.was-validated .form-check-input:valid~.valid-feedback,.was-validated .form-check-input:valid~.valid-tooltip{display:block}.custom-control-input.is-valid~.custom-control-label,.was-validated .custom-control-input:valid~.custom-control-label{color:#28a745}.custom-control-input.is-valid~.custom-control-label::before,.was-validated .custom-control-input:valid~.custom-control-label::before{background-color:#71dd8a}.custom-control-input.is-valid~.valid-feedback,.custom-control-input.is-valid~.valid-tooltip,.was-validated .custom-control-input:valid~.valid-feedback,.was-validated .custom-control-input:valid~.valid-tooltip{display:block}.custom-control-input.is-valid:checked~.custom-control-label::before,.was-validated .custom-control-input:valid:checked~.custom-control-label::before{background-color:#34ce57}.custom-control-input.is-valid:focus~.custom-control-label::before,.was-validated .custom-control-input:valid:focus~.custom-control-label::before{box-shadow:0 0 0 1px #fff,0 0 0 .2rem rgba(40,167,69,.25)}.custom-file-input.is-valid~.custom-file-label,.was-validated .custom-file-input:valid~.custom-file-label{border-color:#28a745}.custom-file-input.is-valid~.custom-file-label::after,.was-validated .custom-file-input:valid~.custom-file-label::after{border-color:inherit}.custom-file-input.is-valid~.valid-feedback,.custom-file-input.is-valid~.valid-tooltip,.was-validated .custom-file-input:valid~.valid-feedback,.was-validated .custom-file-input:valid~.valid-tooltip{display:block}.custom-file-input.is-valid:focus~.custom-file-label,.was-validated .custom-file-input:valid:focus~.custom-file-label{box-shadow:0 0 0 .2rem rgba(40,167,69,.25)}


.btn{display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media screen and (prefers-reduced-motion:reduce){.btn{transition:none}}.btn:focus,.btn:hover{text-decoration:none}.btn.focus,.btn:focus{outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}.btn.disabled,.btn:disabled{opacity:.65}.btn:not(:disabled):not(.disabled){cursor:pointer}a.btn.disabled,fieldset:disabled a.btn{pointer-events:none}.btn-primary{color:#fff;background-color:#007bff;border-color:#007bff}.btn-primary:hover{color:#fff;background-color:#0069d9;border-color:#0062cc}.btn-primary.focus,.btn-primary:focus{box-shadow:0 0 0 .2rem rgba(0,123,255,.5)}.btn-primary.disabled,.btn-primary:disabled{color:#fff;background-color:#007bff;border-color:#007bff}.btn-primary:not(:disabled):not(.disabled).active,.btn-primary:not(:disabled):not(.disabled):active,.show>.btn-primary.dropdown-toggle{color:#fff;background-color:#0062cc;border-color:#005cbf}.btn-primary:not(:disabled):not(.disabled).active:focus,.btn-primary:not(:disabled):not(.disabled):active:focus,.show>.btn-primary.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(0,123,255,.5)}.btn-secondary{color:#fff;background-color:#6c757d;border-color:#6c757d}.btn-secondary:hover{color:#fff;background-color:#5a6268;border-color:#545b62}.btn-secondary.focus,.btn-secondary:focus{box-shadow:0 0 0 .2rem rgba(108,117,125,.5)}.btn-secondary.disabled,.btn-secondary:disabled{color:#fff;background-color:#6c757d;border-color:#6c757d}.btn-secondary:not(:disabled):not(.disabled).active,.btn-secondary:not(:disabled):not(.disabled):active,.show>.btn-secondary.dropdown-toggle{color:#fff;background-color:#545b62;border-color:#4e555b}.btn-secondary:not(:disabled):not(.disabled).active:focus,.btn-secondary:not(:disabled):not(.disabled):active:focus,.show>.btn-secondary.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(108,117,125,.5)}.btn-success{color:#fff;background-color:#28a745;border-color:#28a745}.btn-success:hover{color:#fff;background-color:#218838;border-color:#1e7e34}.btn-success.focus,.btn-success:focus{box-shadow:0 0 0 .2rem rgba(40,167,69,.5)}.btn-success.disabled,.btn-success:disabled{color:#fff;background-color:#28a745;border-color:#28a745}.btn-success:not(:disabled):not(.disabled).active,.btn-success:not(:disabled):not(.disabled):active,.show>.btn-success.dropdown-toggle{color:#fff;background-color:#1e7e34;border-color:#1c7430}.btn-success:not(:disabled):not(.disabled).active:focus,.btn-success:not(:disabled):not(.disabled):active:focus,.show>.btn-success.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(40,167,69,.5)}.btn-info{color:#fff;background-color:#17a2b8;border-color:#17a2b8}.btn-info:hover{color:#fff;background-color:#138496;border-color:#117a8b}.btn-info.focus,.btn-info:focus{box-shadow:0 0 0 .2rem rgba(23,162,184,.5)}.btn-info.disabled,.btn-info:disabled{color:#fff;background-color:#17a2b8;border-color:#17a2b8}.btn-info:not(:disabled):not(.disabled).active,.btn-info:not(:disabled):not(.disabled):active,.show>.btn-info.dropdown-toggle{color:#fff;background-color:#117a8b;border-color:#10707f}.btn-info:not(:disabled):not(.disabled).active:focus,.btn-info:not(:disabled):not(.disabled):active:focus,.show>.btn-info.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(23,162,184,.5)}.btn-warning{color:#212529;background-color:#ffc107;border-color:#ffc107}.btn-warning:hover{color:#212529;background-color:#e0a800;border-color:#d39e00}.btn-warning.focus,.btn-warning:focus{box-shadow:0 0 0 .2rem rgba(255,193,7,.5)}.btn-warning.disabled,.btn-warning:disabled{color:#212529;background-color:#ffc107;border-color:#ffc107}.btn-warning:not(:disabled):not(.disabled).active,.btn-warning:not(:disabled):not(.disabled):active,.show>.btn-warning.dropdown-toggle{color:#212529;background-color:#d39e00;border-color:#c69500}.btn-warning:not(:disabled):not(.disabled).active:focus,.btn-warning:not(:disabled):not(.disabled):active:focus,.show>.btn-warning.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(255,193,7,.5)}.btn-danger{color:#fff;background-color:#dc3545;border-color:#dc3545}.btn-danger:hover{color:#fff;background-color:#c82333;border-color:#bd2130}.btn-danger.focus,.btn-danger:focus{box-shadow:0 0 0 .2rem rgba(220,53,69,.5)}.btn-danger.disabled,.btn-danger:disabled{color:#fff;background-color:#dc3545;border-color:#dc3545}.btn-danger:not(:disabled):not(.disabled).active,.btn-danger:not(:disabled):not(.disabled):active,.show>.btn-danger.dropdown-toggle{color:#fff;background-color:#bd2130;border-color:#b21f2d}.btn-danger:not(:disabled):not(.disabled).active:focus,.btn-danger:not(:disabled):not(.disabled):active:focus,.show>.btn-danger.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(220,53,69,.5)}.btn-light{color:#212529;background-color:#f8f9fa;border-color:#f8f9fa}.btn-light:hover{color:#212529;background-color:#e2e6ea;border-color:#dae0e5}.btn-light.focus,.btn-light:focus{box-shadow:0 0 0 .2rem rgba(248,249,250,.5)}.btn-light.disabled,.btn-light:disabled{color:#212529;background-color:#f8f9fa;border-color:#f8f9fa}.btn-light:not(:disabled):not(.disabled).active,.btn-light:not(:disabled):not(.disabled):active,.show>.btn-light.dropdown-toggle{color:#212529;background-color:#dae0e5;border-color:#d3d9df}.btn-light:not(:disabled):not(.disabled).active:focus,.btn-light:not(:disabled):not(.disabled):active:focus,.show>.btn-light.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(248,249,250,.5)}.btn-dark{color:#fff;background-color:#343a40;border-color:#343a40}.btn-dark:hover{color:#fff;background-color:#23272b;border-color:#1d2124}.btn-dark.focus,.btn-dark:focus{box-shadow:0 0 0 .2rem rgba(52,58,64,.5)}.btn-dark.disabled,.btn-dark:disabled{color:#fff;background-color:#343a40;border-color:#343a40}.btn-dark:not(:disabled):not(.disabled).active,.btn-dark:not(:disabled):not(.disabled):active,.show>.btn-dark.dropdown-toggle{color:#fff;background-color:#1d2124;border-color:#171a1d}.btn-dark:not(:disabled):not(.disabled).active:focus,.btn-dark:not(:disabled):not(.disabled):active:focus,.show>.btn-dark.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(52,58,64,.5)}.btn-outline-primary{color:#007bff;background-color:transparent;background-image:none;border-color:#007bff}.btn-outline-primary:hover{color:#fff;background-color:#007bff;border-color:#007bff}.btn-outline-primary.focus,.btn-outline-primary:focus{box-shadow:0 0 0 .2rem rgba(0,123,255,.5)}.btn-outline-primary.disabled,.btn-outline-primary:disabled{color:#007bff;background-color:transparent}.btn-outline-primary:not(:disabled):not(.disabled).active,.btn-outline-primary:not(:disabled):not(.disabled):active,.show>.btn-outline-primary.dropdown-toggle{color:#fff;background-color:#007bff;border-color:#007bff}.btn-outline-primary:not(:disabled):not(.disabled).active:focus,.btn-outline-primary:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-primary.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(0,123,255,.5)}.btn-outline-secondary{color:#6c757d;background-color:transparent;background-image:none;border-color:#6c757d}.btn-outline-secondary:hover{color:#fff;background-color:#6c757d;border-color:#6c757d}.btn-outline-secondary.focus,.btn-outline-secondary:focus{box-shadow:0 0 0 .2rem rgba(108,117,125,.5)}.btn-outline-secondary.disabled,.btn-outline-secondary:disabled{color:#6c757d;background-color:transparent}.btn-outline-secondary:not(:disabled):not(.disabled).active,.btn-outline-secondary:not(:disabled):not(.disabled):active,.show>.btn-outline-secondary.dropdown-toggle{color:#fff;background-color:#6c757d;border-color:#6c757d}.btn-outline-secondary:not(:disabled):not(.disabled).active:focus,.btn-outline-secondary:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-secondary.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(108,117,125,.5)}.btn-outline-success{color:#28a745;background-color:transparent;background-image:none;border-color:#28a745}.btn-outline-success:hover{color:#fff;background-color:#28a745;border-color:#28a745}.btn-outline-success.focus,.btn-outline-success:focus{box-shadow:0 0 0 .2rem rgba(40,167,69,.5)}.btn-outline-success.disabled,.btn-outline-success:disabled{color:#28a745;background-color:transparent}.btn-outline-success:not(:disabled):not(.disabled).active,.btn-outline-success:not(:disabled):not(.disabled):active,.show>.btn-outline-success.dropdown-toggle{color:#fff;background-color:#28a745;border-color:#28a745}.btn-outline-success:not(:disabled):not(.disabled).active:focus,.btn-outline-success:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-success.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(40,167,69,.5)}.btn-outline-info{color:#17a2b8;background-color:transparent;background-image:none;border-color:#17a2b8}.btn-outline-info:hover{color:#fff;background-color:#17a2b8;border-color:#17a2b8}.btn-outline-info.focus,.btn-outline-info:focus{box-shadow:0 0 0 .2rem rgba(23,162,184,.5)}.btn-outline-info.disabled,.btn-outline-info:disabled{color:#17a2b8;background-color:transparent}.btn-outline-info:not(:disabled):not(.disabled).active,.btn-outline-info:not(:disabled):not(.disabled):active,.show>.btn-outline-info.dropdown-toggle{color:#fff;background-color:#17a2b8;border-color:#17a2b8}.btn-outline-info:not(:disabled):not(.disabled).active:focus,.btn-outline-info:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-info.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(23,162,184,.5)}.btn-outline-warning{color:#ffc107;background-color:transparent;background-image:none;border-color:#ffc107}.btn-outline-warning:hover{color:#212529;background-color:#ffc107;border-color:#ffc107}.btn-outline-warning.focus,.btn-outline-warning:focus{box-shadow:0 0 0 .2rem rgba(255,193,7,.5)}.btn-outline-warning.disabled,.btn-outline-warning:disabled{color:#ffc107;background-color:transparent}.btn-outline-warning:not(:disabled):not(.disabled).active,.btn-outline-warning:not(:disabled):not(.disabled):active,.show>.btn-outline-warning.dropdown-toggle{color:#212529;background-color:#ffc107;border-color:#ffc107}.btn-outline-warning:not(:disabled):not(.disabled).active:focus,.btn-outline-warning:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-warning.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(255,193,7,.5)}.btn-outline-danger{color:#dc3545;background-color:transparent;background-image:none;border-color:#dc3545}.btn-outline-danger:hover{color:#fff;background-color:#dc3545;border-color:#dc3545}.btn-outline-danger.focus,.btn-outline-danger:focus{box-shadow:0 0 0 .2rem rgba(220,53,69,.5)}.btn-outline-danger.disabled,.btn-outline-danger:disabled{color:#dc3545;background-color:transparent}.btn-outline-danger:not(:disabled):not(.disabled).active,.btn-outline-danger:not(:disabled):not(.disabled):active,.show>.btn-outline-danger.dropdown-toggle{color:#fff;background-color:#dc3545;border-color:#dc3545}.btn-outline-danger:not(:disabled):not(.disabled).active:focus,.btn-outline-danger:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-danger.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(220,53,69,.5)}.btn-outline-light{color:#f8f9fa;background-color:transparent;background-image:none;border-color:#f8f9fa}.btn-outline-light:hover{color:#212529;background-color:#f8f9fa;border-color:#f8f9fa}.btn-outline-light.focus,.btn-outline-light:focus{box-shadow:0 0 0 .2rem rgba(248,249,250,.5)}.btn-outline-light.disabled,.btn-outline-light:disabled{color:#f8f9fa;background-color:transparent}.btn-outline-light:not(:disabled):not(.disabled).active,.btn-outline-light:not(:disabled):not(.disabled):active,.show>.btn-outline-light.dropdown-toggle{color:#212529;background-color:#f8f9fa;border-color:#f8f9fa}.btn-outline-light:not(:disabled):not(.disabled).active:focus,.btn-outline-light:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-light.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(248,249,250,.5)}.btn-outline-dark{color:#343a40;background-color:transparent;background-image:none;border-color:#343a40}.btn-outline-dark:hover{color:#fff;background-color:#343a40;border-color:#343a40}.btn-outline-dark.focus,.btn-outline-dark:focus{box-shadow:0 0 0 .2rem rgba(52,58,64,.5)}.btn-outline-dark.disabled,.btn-outline-dark:disabled{color:#343a40;background-color:transparent}.btn-outline-dark:not(:disabled):not(.disabled).active,.btn-outline-dark:not(:disabled):not(.disabled):active,.show>.btn-outline-dark.dropdown-toggle{color:#fff;background-color:#343a40;border-color:#343a40}.btn-outline-dark:not(:disabled):not(.disabled).active:focus,.btn-outline-dark:not(:disabled):not(.disabled):active:focus,.show>.btn-outline-dark.dropdown-toggle:focus{box-shadow:0 0 0 .2rem rgba(52,58,64,.5)}.btn-link{font-weight:400;color:#007bff;background-color:transparent}.btn-link:hover{color:#0056b3;text-decoration:underline;background-color:transparent;border-color:transparent}.btn-link.focus,.btn-link:focus{text-decoration:underline;border-color:transparent;box-shadow:none}.btn-link.disabled,.btn-link:disabled{color:#6c757d;pointer-events:none}.btn-group-lg>.btn,.btn-lg{padding:.5rem 1rem;font-size:1.25rem;line-height:1.5;border-radius:.3rem}.btn-group-sm>.btn,.btn-sm{padding:.25rem .5rem;font-size:.875rem;line-height:1.5;border-radius:.2rem}.btn-block{display:block;width:100%}.btn-block+.btn-block{margin-top:.5rem}input[type=button].btn-block,input[type=reset].btn-block,input[type=submit].btn-block{width:100%}.fade{transition:opacity .15s linear}
.pagination{display:-ms-flexbox;display:flex;padding-left:0;list-style:none;border-radius:.25rem}.page-link{position:relative;display:block;padding:.5rem .75rem;margin-left:-1px;line-height:1.25;color:#007bff;background-color:#fff;border:1px solid #dee2e6}.page-link:hover{z-index:2;color:#0056b3;text-decoration:none;background-color:#e9ecef;border-color:#dee2e6}.page-link:focus{z-index:2;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}.page-link:not(:disabled):not(.disabled){cursor:pointer}.page-item:first-child .page-link{margin-left:0;border-top-left-radius:.25rem;border-bottom-left-radius:.25rem}.page-item:last-child .page-link{border-top-right-radius:.25rem;border-bottom-right-radius:.25rem}.page-item.active .page-link{z-index:1;color:#fff;background-color:#007bff;border-color:#007bff}.page-item.disabled .page-link{color:#6c757d;pointer-events:none;cursor:auto;background-color:#fff;border-color:#dee2e6}.pagination-lg .page-link{padding:.75rem 1.5rem;font-size:1.25rem;line-height:1.5}.pagination-lg .page-item:first-child .page-link{border-top-left-radius:.3rem;border-bottom-left-radius:.3rem}.pagination-lg .page-item:last-child .page-link{border-top-right-radius:.3rem;border-bottom-right-radius:.3rem}.pagination-sm .page-link{padding:.25rem .5rem;font-size:.875rem;line-height:1.5}.pagination-sm .page-item:first-child .page-link{border-top-left-radius:.2rem;border-bottom-left-radius:.2rem}.pagination-sm .page-item:last-child .page-link{border-top-right-radius:.2rem;border-bottom-right-radius:.2rem}
/*<!-- Template Style CSS -->*/
<style type='text/css'>

@font-face{font-family:'Lato';font-style:normal;font-weight:400;src:local('Lato Regular'),local('Lato-Regular'),url(http://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjxAwXjeu.woff2)format('woff2');unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF;}@font-face{font-family:'Lato';font-style:normal;font-weight:400;src:local('Lato Regular'),local('Lato-Regular'),url(//fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXg.woff2)format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD;}
</style>


/*
-----------------------------------------------
Blogger Template Style
Name:        GalaxyMag
Version:     1.8.0
Author:      Templateify
Author Url:  https://themeforest.net/user/templateifydotcom
----------------------------------------------- */

/*-- Google Font --*/

@font-face{font-family:'Lato';font-style:italic;font-weight:400;src:local('Lato Italic'),local(Lato-Italic),url(https://fonts.gstatic.com/s/lato/v15/S6u8w4BMUTPHjxsAUi-qJCY.woff2) format("woff2");unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}
@font-face{font-family:'Lato';font-style:italic;font-weight:400;src:local('Lato Italic'),local(Lato-Italic),url(https://fonts.gstatic.com/s/lato/v15/S6u8w4BMUTPHjxsAXC-q.woff2) format("woff2");unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}
@font-face{font-family:'Lato';font-style:italic;font-weight:700;src:local('Lato Bold Italic'),local(Lato-BoldItalic),url(https://fonts.gstatic.com/s/lato/v15/S6u_w4BMUTPHjxsI5wq_FQft1dw.woff2) format("woff2");unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}
@font-face{font-family:'Lato';font-style:italic;font-weight:700;src:local('Lato Bold Italic'),local(Lato-BoldItalic),url(https://fonts.gstatic.com/s/lato/v15/S6u_w4BMUTPHjxsI5wq_Gwft.woff2) format("woff2");unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}
@font-face{font-family:'Lato';font-style:normal;font-weight:400;src:local('Lato Regular'),local(Lato-Regular),url(https://fonts.gstatic.com/s/lato/v15/S6uyw4BMUTPHjxAwXjeu.woff2) format("woff2");unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}
@font-face{font-family:'Lato';font-style:normal;font-weight:400;src:local('Lato Regular'),local(Lato-Regular),url(https://fonts.gstatic.com/s/lato/v15/S6uyw4BMUTPHjx4wXg.woff2) format("woff2");unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}
@font-face{font-family:'Lato';font-style:normal;font-weight:700;src:local('Lato Bold'),local(Lato-Bold),url(https://fonts.gstatic.com/s/lato/v15/S6u9w4BMUTPHh6UVSwaPGR_p.woff2) format("woff2");unicode-range:U+0100-024F,U+0259,U+1E00-1EFF,U+2020,U+20A0-20AB,U+20AD-20CF,U+2113,U+2C60-2C7F,U+A720-A7FF}
@font-face{font-family:'Lato';font-style:normal;font-weight:700;src:local('Lato Bold'),local(Lato-Bold),url(https://fonts.gstatic.com/s/lato/v15/S6u9w4BMUTPHh6UVSwiPGQ.woff2) format("woff2");unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02BB-02BC,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2122,U+2191,U+2193,U+2212,U+2215,U+FEFF,U+FFFD}
/*-- Reset CSS --*/
a,abbr,acronym,address,applet,b,big,blockquote,body,caption,center,cite,code,dd,del,dfn,div,dl,dt,em,fieldset,font,form,h1,h2,h3,h4,h5,h6,html,i,iframe,img,ins,kbd,label,legend,li,object,p,pre,q,s,samp,small,span,strike,strong,sub,sup,table,tbody,td,tfoot,th,thead,tr,tt,u,ul,var{padding:0;border:0;outline:0;vertical-align:baseline;background:0 0;text-decoration:none}form,textarea,input,button{-webkit-appearance:none;-moz-appearance:none;appearance:none;border-radius:0}dl,ul{list-style-position:inside;font-weight:400;list-style:none}ul li{list-style:none}caption,th{text-align:center}img{border:none;position:relative}a,a:visited{text-decoration:none}.clearfix{clear:both}.section,.widget,.widget ul{margin:0;padding:0}a{color:<?php echo $theme_colour_two; ?>}a img{border:0}abbr{text-decoration:none}.CSS_LIGHTBOX{z-index:999999!important}.separator a{clear:none!important;float:none!important;margin-left:0!important;margin-right:0!important}#navbar-iframe,.widget-item-control,a.quickedit,.home-link,.feed-links{display:none!important}.center{display:table;margin:0 auto;position:relative}.widget > h2,.widget > h3{display:none}.widget iframe,.widget img{max-width:100%}
/*-- Body Content CSS --*/
:root{--body-font:'Poppins', sans-serif;'Lato',Segoe UI,Helvetica Neue,Arial,sans-serif;--meta-font:'Lato',Segoe UI,Helvetica Neue,Arial,sans-serif;--text-font:'Poppins', sans-serif;'Lato','Lato',Segoe UI,Helvetica Neue,Arial,sans-serif}
body{position:relative;background-color:#f5f5f5;background:#f5f5f5 url('../images/<?php echo $bg_image; ?>') repeat scroll top left;font-family:var(--body-font);font-size:13px;color:#656565;font-weight:300;font-style:normal;line-height:1.4em;word-wrap:break-word;margin:0;padding:0}
.rtl{direction:rtl}
.no-items.section{display:none}

h1,h2,h3,h4,h5,h6{font-family:var(--body-font);font-weight:700}
input {
  width: 100%;
  padding: 35px 30px;
  margin: 8px 0;
  box-sizing: border-box;
}
#outer-wrapper{position:relative;overflow:hidden;width:100%;max-width:100%;margin:0 auto;background-color:#ffffff;box-shadow:0 0 20px rgba(0,0,0,0.1)}
.row-x1{width:970px}
#content-wrapper{margin:35px auto;overflow:hidden}
#main-wrapper{float:left;overflow:hidden;width:calc(100% - (300px + 35px));box-sizing:border-box;padding:0}
.rtl #main-wrapper{float:right}
#sidebar-wrapper{float:right;overflow:hidden;width:300px;box-sizing:border-box;padding:0}
.rtl #sidebar-wrapper{float:left}
.entry-image-link,.cmm-avatar,.comments .avatar-image-container{background-color:rgba(155,155,155,0.08);color:transparent!important}
.entry-thumb{display:block;position:relative;width:100%;height:100%;background-size:cover;background-position:center center;background-repeat:no-repeat;z-index:1;opacity:0;transition:opacity .25s ease,filter .0s ease}
.entry-thumb.lazy-ify{opacity:1}
.entry-image-link:hover .entry-thumb,.featured-item:hover .entry-image-link .entry-thumb,.block-inner:hover .entry-thumb,.column-inner:hover .entry-thumb,.videos-inner:hover .entry-thumb{filter:brightness(1.1)}
.before-mask:before{content:'';position:absolute;left:0;right:0;bottom:0;height:65%;background-image:linear-gradient(to bottom,transparent,rgba(0,0,0,0.65));-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:2;opacity:1;margin:-1px;transition:opacity .25s ease}
.entry-title{color:<?php echo $theme_colour_one; ?>}
.entry-title a{color:<?php echo $theme_colour_one; ?>;display:block}
.entry-title a:hover{color:<?php echo $theme_colour_two; ?>}
.entry-info .entry-title a:hover{text-decoration:underline}
.excerpt{font-family:var(--text-font)}
.social a:before{display:inline-block;font-family:'Font Awesome 5 Brands';font-style:normal;font-weight:400}
.social .blogger a:before{content:"\f37d"}
.social .facebook a:before{content:"\f09a"}
.social .facebook-f a:before{content:"\f39e"}
.social .twitter a:before{content:"\f099"}
.social .rss a:before{content:"\f09e";font-family:'Font Awesome 5 Free';font-weight:900}
.social .youtube a:before{content:"\f167"}
.social .skype a:before{content:"\f17e"}
.social .stumbleupon a:before{content:"\f1a4"}
.social .tumblr a:before{content:"\f173"}
.social .vk a:before{content:"\f189"}
.social .stack-overflow a:before{content:"\f16c"}
.social .github a:before{content:"\f09b"}
.social .linkedin a:before{content:"\f0e1"}
.social .dribbble a:before{content:"\f17d"}
.social .soundcloud a:before{content:"\f1be"}
.social .behance a:before{content:"\f1b4"}
.social .digg a:before{content:"\f1a6"}
.social .instagram a:before{content:"\f16d"}
.social .pinterest a:before{content:"\f0d2"}
.social .pinterest-p a:before{content:"\f231"}
.social .twitch a:before{content:"\f1e8"}
.social .delicious a:before{content:"\f1a5"}
.social .codepen a:before{content:"\f1cb"}
.social .flipboard a:before{content:"\f44d"}
.social .reddit a:before{content:"\f281"}
.social .whatsapp a:before{content:"\f232"}
.social .messenger a:before{content:"\f39f"}
.social .snapchat a:before{content:"\f2ac"}
.social .telegram a:before{content:"\f3fe"}
.social .email a:before{content:"\f0e0";font-family:'Font Awesome 5 Free';font-weight:400}
.social .external-link a:before{content:"\f35d";font-family:'Font Awesome 5 Free';font-weight:900}
.social-color .blogger a,.social-hover-color .blogger a:hover{background-color:#ff5722}
.social-color .facebook a,.social-color .facebook-f a,.social-hover-color .facebook a:hover,.social-hover-color .facebook-f a:hover{background-color:#3b5999}
.social-color .twitter a,.social-hover-color .twitter a:hover{background-color:#00acee}
.social-color .youtube a,.social-hover-color .youtube a:hover{background-color:#f50000}
.social-color .instagram a,.social-hover-color .instagram a:hover{background:linear-gradient(15deg,#ffb13d,#dd277b,#4d5ed4)}
.social-color .pinterest a,.social-color .pinterest-p a,.social-hover-color .pinterest a:hover,.social-hover-color .pinterest-p a:hover{background-color:#ca2127}
.social-color .dribbble a,.social-hover-color .dribbble a:hover{background-color:#ea4c89}
.social-color .linkedin a,.social-hover-color .linkedin a:hover{background-color:#0077b5}
.social-color .tumblr a,.social-hover-color .tumblr a:hover{background-color:#365069}
.social-color .twitch a,.social-hover-color .twitch a:hover{background-color:#6441a5}
.social-color .rss a,.social-hover-color .rss a:hover{background-color:#ffc200}
.social-color .skype a,.social-hover-color .skype a:hover{background-color:#00aff0}
.social-color .stumbleupon a,.social-hover-color .stumbleupon a:hover{background-color:#eb4823}
.social-color .vk a,.social-hover-color .vk a:hover{background-color:#4a76a8}
.social-color .stack-overflow a,.social-hover-color .stack-overflow a:hover{background-color:#f48024}
.social-color .github a,.social-hover-color .github a:hover{background-color:#24292e}
.social-color .soundcloud a,.social-hover-color .soundcloud a:hover{background:linear-gradient(#ff7400,#ff3400)}
.social-color .behance a,.social-hover-color .behance a:hover{background-color:#191919}
.social-color .digg a,.social-hover-color .digg a:hover{background-color:#1b1a19}
.social-color .delicious a,.social-hover-color .delicious a:hover{background-color:#0076e8}
.social-color .codepen a,.social-hover-color .codepen a:hover{background-color:#000}
.social-color .flipboard a,.social-hover-color .flipboard a:hover{background-color:#f52828}
.social-color .reddit a,.social-hover-color .reddit a:hover{background-color:#ff4500}
.social-color .whatsapp a,.social-hover-color .whatsapp a:hover{background-color:#3fbb50}
.social-color .messenger a,.social-hover-color .messenger a:hover{background-color:#0084ff}
.social-color .snapchat a,.social-hover-color .snapchat a:hover{background-color:#ffe700}
.social-color .telegram a,.social-hover-color .telegram a:hover{background-color:#179cde}
.social-color .email a,.social-hover-color .email a:hover{background-color:#888}
.social-color .external-link a,.social-hover-color .external-link a:hover{background-color:<?php echo $theme_colour_one; ?>}
#header-wrapper{position:relative;float:left;width:100%;margin:0;box-shadow:0 0 20px rgba(0,0,0,.15)}
.navbar-wrap,.navbar{position:relative;float:left;width:100%;height:60px;background-color:<?php echo $theme_colour_one; ?>;padding:0;margin:0}
#header-wrapper .container{position:relative;margin:0 auto}
.main-logo-wrap{position:relative;float:left;margin:0 30px 0 0}
.rtl .main-logo-wrap{float:right;margin:0 0 0 30px}
.main-logo{position:relative;float:left;width:100%;height:34px;padding:13px 0;margin:0}
.main-logo .main-logo-img{float:left;height:34px;overflow:hidden}
.main-logo img{max-width:100%;height:34px;margin:0}
.main-logo h1{font-size:22px;color:#e7e8e9;line-height:34px;margin:0}
.main-logo h1 a{color:#e7e8e9}
.main-logo #h1-tag{position:absolute;top:-9000px;left:-9000px;display:none;visibility:hidden}
.main-menu-wrap{position:static;float:left;height:60px;margin:0}
.rtl .main-menu-wrap{float:right}
#galaxymag-main-menu .widget,#galaxymag-main-menu .widget > .widget-title{display:none}
#galaxymag-main-menu .show-menu{display:block}
#galaxymag-main-menu{position:static;width:100%;height:60px;z-index:10}
#galaxymag-main-menu ul > li{position:relative;float:left;display:inline-block;padding:0;margin:0}
.rtl #galaxymag-main-menu ul > li{float:right}
#galaxymag-main-menu-nav > li > a{position:relative;display:block;height:60px;font-size:14px;color:#e7e8e9;font-weight:700;text-transform:uppercase;line-height:60px;padding:0 15px;margin:0}
#galaxymag-main-menu-nav > li:hover > a{background-color:<?php echo $theme_colour_two; ?>;color:#ffffff}
#galaxymag-main-menu ul > li > ul{position:absolute;float:left;left:0;top:60px;width:180px;background-color:<?php echo $theme_colour_two; ?>;z-index:99999;visibility:hidden;opacity:0;padding:0;box-shadow:0 2px 5px 0 rgba(0,0,0,0.15),0 2px 10px 0 rgba(0,0,0,0.17)}
.rtl #galaxymag-main-menu ul > li > ul{left:auto;right:0}
#galaxymag-main-menu ul > li > ul > li > ul{position:absolute;float:left;top:0;left:100%;margin:0}
.rtl #galaxymag-main-menu ul > li > ul > li > ul{float:left;left:auto;right:100%}
#galaxymag-main-menu ul > li > ul > li{display:block;float:none;position:relative}
.rtl #galaxymag-main-menu ul > li > ul > li{float:none}
#galaxymag-main-menu ul > li > ul > li a{position:relative;display:block;height:36px;font-size:13px;color:#f2f2f2;line-height:36px;font-weight:400;box-sizing:border-box;padding:0 15px;margin:0;border-bottom:1px solid rgba(155,155,155,0.07)}
#galaxymag-main-menu ul > li > ul > li:last-child a{border:0}
#galaxymag-main-menu ul > li > ul > li:hover > a{background-color:<?php echo $theme_colour_one; ?>;color:#ffffff}
#galaxymag-main-menu ul > li.has-sub > a:after{content:'\f078';float:right;font-family:'Font Awesome 5 Free';font-size:9px;font-weight:900;margin:-1px 0 0 5px}
.rtl #galaxymag-main-menu ul > li.has-sub > a:after{float:left;margin:-1px 5px 0 0}
#galaxymag-main-menu ul > li > ul > li.has-sub > a:after{content:'\f054';float:right;margin:0}
.rtl #galaxymag-main-menu ul > li > ul > li.has-sub > a:after{content:'\f053'}
#galaxymag-main-menu ul > li:hover > ul,#galaxymag-main-menu ul > li > ul > li:hover > ul{visibility:visible;opacity:1}
#galaxymag-main-menu ul ul{transition:all .17s ease}
#galaxymag-main-menu .getMega{display:none}
#galaxymag-main-menu .mega-menu{position:static!important}
#galaxymag-main-menu .mega-menu > ul{width:100%;background-color:<?php echo $theme_colour_one; ?>;box-sizing:border-box;padding:20px 10px}
#galaxymag-main-menu .mega-menu > ul.mega-widget,#galaxymag-main-menu .mega-menu > ul.complex-tabs{overflow:hidden}
#galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab{position:relative;float:left;width:20%;box-sizing:border-box;padding:20px 0;margin:-20px 0 0 -10px}
.rtl #galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab{float:right;margin:-20px -10px 0 0}
#galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab:before{content:'';position:absolute;left:0;top:0;width:100%;height:100vh;background-color:rgba(155,155,155,0.07);box-sizing:border-box;display:block}
#galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab > li{width:100%;margin:0}
#galaxymag-main-menu ul > li > ul.complex-tabs > ul.select-tab > li > a{position:relative;display:block;height:auto;font-size:13px;color:#f2f2f2;line-height:33px;padding:0 20px}
#galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab > li.active > a:after{content:'\f054';font-family:'Font Awesome 5 Free';font-weight:900;font-size:9px;float:right}
.rtl #galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab > li.active > a:after{content:'\f053';float:left}
#galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab > li.active,#galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab > li:hover{background-color:<?php echo $theme_colour_two; ?>}
#galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab > li.active > a,#galaxymag-main-menu .mega-menu > ul.complex-tabs > ul.select-tab > li:hover > a{color:#ffffff}
.mega-tab{display:none;position:relative;width:80%;float:right;margin:0}
.rtl .mega-tab{float:left}
.tab-active{display:block}
.tab-animated,.post-animated{-webkit-animation-duration:.5s;animation-duration:.5s;-webkit-animation-fill-mode:both;animation-fill-mode:both}
@keyframes fadeIn {
from{opacity:0}
to{opacity:1}
}
.tab-fadeIn,.post-fadeIn{animation-name:fadeIn}
@keyframes fadeInUp {
from{opacity:0;transform:translate3d(0,5px,0)}
to{opacity:1;transform:translate3d(0,0,0)}
}
.tab-fadeInUp,.post-fadeInUp{animation-name:fadeInUp}
.mega-widget .mega-item{float:left;width:20%;box-sizing:border-box;padding:0 10px}
.rtl .mega-widget .mega-item{float:right}
.mega-tab .mega-widget .mega-item{width:25%}
.mega-widget .mega-content{position:relative;width:100%;overflow:hidden;padding:0}
.mega-content .entry-image-link{width:100%;height:120px;min-height:120px;background-color:rgba(255,255,255,0.01);z-index:1;display:block;position:relative;overflow:hidden;padding:0}
.mega-tab .entry-thumb{width:calc((970px - 120px) / 5);height:120px}
.mega-content .entry-title{position:relative;font-size:13px;font-weight:700;line-height:1.4em;margin:8px 0 2px;padding:0}
.mega-content .entry-title a{color:#f2f2f2}
.mega-content .entry-title a:hover{color:<?php echo $theme_colour_two; ?>}
.no-posts{display:block;font-size:14px;color:<?php echo $theme_colour_one; ?>;padding:35px 0;font-weight:400}
.mega-menu .no-posts{color:#aaaaaa;text-align:center;padding:0}
.show-search,.hide-search{position:absolute;top:0;right:0;display:block;width:60px;height:60px;background-color:<?php echo $theme_colour_one; ?>;color:#e7e8e9;font-size:15px;line-height:60px;text-align:right;cursor:pointer;z-index:20}
.rtl .show-search,.rtl .hide-search{right:auto;left:0;text-align:left}
.show-search:before{content:"\f002";font-family:'Font Awesome 5 Free';font-weight:900}
.hide-search:before{content:"\f00d";font-family:'Font Awesome 5 Free';font-weight:900}
.show-search:hover,.hide-search:hover{color:#ffffff}
#nav-search{display:none;position:absolute;left:0;top:0;width:100%;height:60px;z-index:25;background-color:<?php echo $theme_colour_one; ?>;box-sizing:border-box;padding:0}
#nav-search .search-form{width:100%;height:60px;background-color:rgba(0,0,0,0);line-height:60px;overflow:hidden;padding:0}
#nav-search .search-input{width:100%;height:60px;color:#e7e8e9;margin:0;padding:0 60px 0 0;background-color:rgba(0,0,0,0);font-family:inherit;font-size:14px;font-weight:400;box-sizing:border-box;border:0}
.rtl #nav-search .search-input{padding:0 0 0 60px}
#nav-search .search-input:focus{color:#e7e8e9;outline:none}
#nav-search .search-input::placeholder{color:#e7e8e9;opacity:.5}
.overlay{visibility:hidden;opacity:0;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,.7);z-index:1000;margin:0;transition:all .25s ease}
.show-mobile-menu{display:none;position:absolute;top:0;left:0;height:60px;color:#e7e8e9;font-size:16px;font-weight:600;line-height:60px;text-align:center;cursor:pointer;z-index:20;padding:0 20px}
.rtl .show-mobile-menu{left:auto;right:0}
.show-mobile-menu:before{content:"\f0c9";font-family:'Font Awesome 5 Free';font-weight:900}
.show-mobile-menu:hover{color:#ffffff}
#slide-menu{display:none;position:fixed;width:300px;height:100%;top:0;left:0;bottom:0;background-color:<?php echo $theme_colour_one; ?>ee;overflow:auto;z-index:1010;left:0;transform:translateX(-100%);visibility:hidden;box-shadow:3px 0 7px rgba(0,0,0,0.1);transition:all .25s ease}
.rtl #slide-menu{left:unset;right:0;transform:translateX(100%)}
.nav-active #slide-menu,.rtl .nav-active #slide-menu{transform:translateX(0);visibility:visible}
.slide-menu-header{float:left;width:100%;height:60px;background-color:<?php echo $theme_colour_one; ?>;overflow:hidden;box-sizing:border-box;box-shadow:0 0 20px rgba(0,0,0,0.15)}
.mobile-logo{float:left;max-width:calc(100% - 60px);height:34px;overflow:hidden;box-sizing:border-box;padding:0 20px;margin:13px 0 0}
.rtl .mobile-logo{float:right}
.mobile-logo a{display:block;height:34px;font-size:22px;color:#e7e8e9;line-height:34px;font-weight:700}
.mobile-logo img{max-width:100%;height:34px}
.hide-mobile-menu{position:absolute;top:0;right:0;display:block;height:60px;color:#e7e8e9;font-size:16px;line-height:60px;text-align:center;cursor:pointer;z-index:20;padding:0 20px}
.rtl .hide-mobile-menu{right:auto;left:0}
.hide-mobile-menu:before{content:"\f00d";font-family:'Font Awesome 5 Free';font-weight:900}
.hide-mobile-menu:hover{color:#ffffff}
.slide-menu-flex{display:flex;flex-direction:column;justify-content:space-between;float:left;width:100%;height:calc(100% - 60px)}
.mobile-menu{position:relative;float:left;width:100%;box-sizing:border-box;padding:20px}
.mobile-menu > ul{margin:0}
.mobile-menu .m-sub{display:none;padding:0}
.mobile-menu ul li{position:relative;display:block;overflow:hidden;float:left;width:100%;font-size:14px;font-weight:700;line-height:40px;margin:0;padding:0}
.mobile-menu > ul li ul{overflow:hidden}
.mobile-menu ul li a{color:#e7e8e9;padding:0;display:block}
.mobile-menu > ul > li > a{text-transform:uppercase}
.mobile-menu ul li.has-sub .submenu-toggle{position:absolute;top:0;right:0;color:#e7e8e9;cursor:pointer}
.rtl .mobile-menu ul li.has-sub .submenu-toggle{right:auto;left:0}
.mobile-menu ul li.has-sub .submenu-toggle:after{content:'\f078';font-family:'Font Awesome 5 Free';font-weight:900;float:right;width:40px;font-size:12px;text-align:right;transition:all .17s ease}
.rtl .mobile-menu ul li.has-sub .submenu-toggle:after{text-align:left}
.mobile-menu ul li.has-sub.show > .submenu-toggle:after{content:'\f077'}
.mobile-menu ul li a:hover,.mobile-menu ul li.has-sub.show > a,.mobile-menu ul li.has-sub.show > .submenu-toggle{color:#ffffff}
.mobile-menu > ul > li > ul > li a{font-size:13px;font-weight:400;opacity:.8;padding:0 0 0 15px}
.rtl .mobile-menu > ul > li > ul > li a{padding:0 15px 0 0}
.mobile-menu > ul > li > ul > li > ul > li > a{padding:0 0 0 30px}
.rtl .mobile-menu > ul > li > ul > li > ul > li > a{padding:0 30px 0 0}
.mobile-menu ul > li > .submenu-toggle:hover{color:#ffffff}
.social-mobile{position:relative;float:left;width:100%;margin:0}
.social-mobile ul{display:block;text-align:center;padding:20px;margin:0}
.social-mobile ul li{display:inline-block;margin:0 5px}
.social-mobile ul li a{display:block;font-size:17px;color:#e7e8e9;padding:0 5px}
.social-mobile ul li a:hover{color:#ffffff}
.is-fixed{position:fixed;top:-60px;left:0;width:100%;z-index:990;transition:top .17s ease}
.navbar.show{top:0;box-shadow:0 0 20px rgba(0,0,0,.15)}
.nav-active .is-fixed{top:0}
.loader{position:relative;height:100%;overflow:hidden;display:block}
.loader:after{content:'';position:absolute;top:50%;left:50%;width:28px;height:28px;margin:-16px 0 0 -16px;border:2px solid <?php echo $theme_colour_two; ?>;border-right-color:rgba(155,155,155,0.17);border-radius:100%;animation:spinner .8s infinite linear;transform-origin:center}
@-webkit-keyframes spinner {
0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}
to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}
}
@keyframes spinner {
0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}
to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}
}
.owl-carousel{display:none;width:100%;-webkit-tap-highlight-color:transparent;position:relative;z-index:1}
.owl-carousel .owl-stage{position:relative;-ms-touch-action:pan-Y}
.owl-carousel .owl-stage:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}
.owl-carousel .owl-stage-outer{position:relative;overflow:hidden;-webkit-transform:translate3d(0px,0px,0px)}
.owl-carousel .owl-controls .owl-nav .owl-prev,.owl-carousel .owl-controls .owl-nav .owl-next,.owl-carousel .owl-controls .owl-dot{cursor:pointer;cursor:hand;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}
.owl-carousel.owl-loaded{display:block}
.owl-carousel.owl-loading{opacity:0;display:block}
.owl-carousel.owl-hidden{opacity:0}
.owl-carousel .owl-refresh .owl-item{display:none}
.owl-carousel .owl-item{position:relative;min-height:1px;float:left;-webkit-backface-visibility:visible;-webkit-tap-highlight-color:transparent;-webkit-touch-callout:none;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}
.owl-carousel .owl-item img{display:block;width:100%;-webkit-transform-style:preserve-3d;transform-style:preserve-3d}
.owl-carousel.owl-text-select-on .owl-item{-webkit-user-select:auto;-moz-user-select:auto;-ms-user-select:auto;user-select:auto}
.owl-carousel .owl-grab{cursor:move;cursor:-webkit-grab;cursor:-o-grab;cursor:-ms-grab;cursor:grab}
.owl-carousel.owl-rtl{direction:rtl}
.owl-carousel.owl-rtl .owl-item{float:right}
.no-js .owl-carousel{display:block}
.owl-carousel .animated{-webkit-animation-duration:1000ms;animation-duration:1000ms;-webkit-animation-fill-mode:both;animation-fill-mode:both}
.owl-carousel .owl-animated-in{z-index:1}
.owl-carousel .owl-animated-out{z-index:0}
.owl-height{-webkit-transition:height 500ms ease-in-out;-moz-transition:height 500ms ease-in-out;-ms-transition:height 500ms ease-in-out;-o-transition:height 500ms ease-in-out;transition:height 500ms ease-in-out}
.owl-prev,.owl-next{position:relative;float:left;width:22px;height:22px;background-color:rgba(0,0,0,0);font-family:'Font Awesome 5 Free';font-size:10px;line-height:20px;font-weight:900;color:#aaaaaa;text-align:center;cursor:pointer;border:1px solid rgba(155,155,155,0.17);border-radius:2px;box-sizing:border-box}
.rtl .owl-prev,.rtl .owl-next{float:right}
.owl-prev:before,.rtl .owl-next:before{content:"\f053"}
.owl-next:before,.rtl .owl-prev:before{content:"\f054"}
.owl-prev:hover,.owl-next:hover{background-color:<?php echo $theme_colour_two; ?>;color:#fff;border-color:<?php echo $theme_colour_two; ?>}
#breaking-wrap{position:relative;float:left;width:100%;background-color:<?php echo $theme_colour_two; ?>;margin:0}
#breaking-wrap .container{margin:0 auto}
#breaking-sec .widget{display:block;height:24px;padding:5px 0;margin:0}
#breaking-sec .no-posts{height:24px;line-height:24px;text-align:left;padding:0 0 0 15px}
#breaking-sec .widget > .widget-title{display:block;position:relative;float:left;height:auto;color:#ffffff;font-size:11px;line-height:24px;text-transform:uppercase;padding:0}
.rtl #breaking-sec .widget > .widget-title{float:right}
#breaking-sec .widget > .widget-title > h3{font-weight:700;margin:0}
#breaking-sec .widget > .widget-title > h3:before{content:'\F0E7';font-family:'Font Awesome 5 Free';float:left;font-size:11px;font-weight:900;margin:0 5px 0 0}
.rtl #breaking-sec .widget > .widget-title > h3:before{float:right;margin:0 0 0 5px}
#breaking-sec .widget-content{position:relative;font-size:13px;display:none;overflow:hidden;height:24px;line-height:23px;opacity:0;box-sizing:border-box;padding:0}
#breaking-sec .show-ify .widget-content{display:block;opacity:1}
#breaking-sec .no-posts{color:#ffffff}
.breaking-news{width:100%!important;box-sizing:border-box;padding:0 0 0 15px}
.rtl .breaking-news{padding:0 15px 0 0}
.breaking-news:after{content:"";position:absolute;background-image:linear-gradient(to right,<?php echo $theme_colour_two; ?>00,<?php echo $theme_colour_two; ?>);top:0;right:48px;width:50px;height:24px}
.rtl .breaking-news:after{background-image:linear-gradient(to left,<?php echo $theme_colour_two; ?>00,<?php echo $theme_colour_two; ?>);right:auto;left:48px}
.breaking-news .breaking-item{position:relative;float:left;display:block;height:24px;padding:0}
.rtl .breaking-news .breaking-item{float:right}
.breaking-news .entry-title{height:24px;font-size:13px;font-weight:400;line-height:24px;margin:0;padding:0}
.breaking-news .entry-title a{position:relative;display:block;color:#ffffff;overflow:hidden;opacity:.9}
.breaking-news .entry-title a:hover{color:#ffffff;opacity:1}
.breaking-news .owl-nav{position:absolute;top:0;right:0;width:48px;height:22px;background-color:<?php echo $theme_colour_two; ?>;margin:1px 0 0}
.rtl .breaking-news .owl-nav{right:auto;left:0}
.breaking-news .owl-nav .owl-prev,.breaking-news .owl-nav .owl-next{background-color:rgba(0,0,0,0);color:#ffffff;border-color:#ffffff30}
.breaking-news .owl-nav .owl-prev:hover,.breaking-news .owl-nav .owl-next:hover{background-color:#ffffff;color:<?php echo $theme_colour_two; ?>;border-color:rgba(0,0,0,0)}
.breaking-news .owl-nav .owl-next{margin:0 0 0 4px}
.rtl .breaking-news .owl-nav .owl-next{margin:0 4px 0 0}
@keyframes fadeInLeft {
from{opacity:0;transform:translate3d(-30px,0,0)}
to{opacity:1;transform:none}
}
@keyframes fadeOutLeft {
from{opacity:1}
to{opacity:0;transform:translate3d(-30px,0,0)}
}
@keyframes fadeInRight {
from{opacity:0;transform:translate3d(30px,0,0)}
to{opacity:1;transform:none}
}
.fadeInRight{animation-name:fadeInRight}
.rtl .fadeInRight{animation-name:fadeInLeft}
@keyframes fadeOutRight {
from{opacity:1}
to{opacity:0;transform:translate3d(30px,0,0)}
}
.fadeOutRight{animation-name:fadeOutRight}
.rtl .fadeOutRight{animation-name:fadeOutLeft}
.header-ads-wrap{position:relative;float:left;width:100%;line-height:1}
.header-ads-wrap .container{text-align:center;margin:0 auto}
.header-ad .widget{position:relative;line-height:0;margin:35px 0 0}
.header-ad .widget > .widget-title{display:none!important}
#featured-wrapper .container{margin:0 auto}
#featured-sec .widget,#featured-sec .widget > .widget-title{display:none}
#featured-sec .show-ify{display:block!important;overflow:hidden}
#featured-sec .widget{position:relative;padding:0}
#featured-sec .show-ify .widget-content{position:relative;overflow:hidden;height:402px;margin:35px 0 0}
#featured-sec .no-posts{line-height:300px;text-align:center}
#featured-sec .featured-grid{position:relative;overflow:hidden;height:402px;margin:0 -1px}
.featured-item{position:relative;float:left;width:25%;height:200px;overflow:hidden;box-sizing:border-box;padding:0 1px}
.rtl .featured-item{float:right}
.featured-item-inner{position:relative;float:left;width:100%;height:100%;overflow:hidden;display:block}
.featured-item .entry-image-link{width:100%;height:100%;position:relative;overflow:hidden;display:block}
.entry-category{position:absolute;display:inline-block;top:15px;left:15px;height:18px;z-index:5;background-color:<?php echo $theme_colour_two; ?>;color:#fff;font-size:10px;line-height:19px;text-transform:uppercase;padding:0 5px;border-radius:2px}
.rtl .entry-category{left:auto;right:15px}
.featured-item .entry-category{position:relative;top:auto;left:auto;right:auto;margin:0}
.entry-info{position:absolute;bottom:0;left:0;overflow:hidden;z-index:5;box-sizing:border-box;padding:15px;width:100%;background-image:linear-gradient(to bottom,transparent,rgba(0,0,0,0.3))}
.featured-item .entry-title{font-size:14px;font-weight:700;display:block;line-height:1.4em;margin:10px 0 0}
.font-size1 .featured-item .entry-title{font-size:13px}
.featured-item .entry-title a{color:#fff;display:block}
.entry-meta{font-family:var(--meta-font);font-size:11px;color:#aaaaaa;font-weight:400;padding:0}
.entry-meta span,.entry-meta em{float:left;font-style:normal;margin:0 4px 0 0}
.rtl .entry-meta span,.rtl .entry-meta em{float:right;margin:0 0 0 4px}
.entry-meta span.by{color:<?php echo $theme_colour_one; ?>;font-weight:600;margin:0}
.entry-meta .entry-comments-link{float:right;display:none}
.rtl .entry-meta .entry-comments-link{float:left}
.entry-meta .entry-comments-link.show{display:block}
.entry-meta .entry-comments-link:before{content:'\f086';font-family:'Font Awesome 5 Free';font-size:12px;color:<?php echo $theme_colour_one; ?>;font-weight:400;margin:0 4px 0 0}
.rtl .entry-meta .entry-comments-link:before{float:right;margin:0 0 0 4px}
.featured-item .entry-meta{color:#ccc;margin:5px 0 0}
.featured-item .entry-meta .by{color:#f2f2f2}
.featured1 .item-0{width:50%;height:402px}
.featured1 .item-1{width:50%;margin:0 0 2px}
.featured1 .item-0 .entry-info{padding:20px}
.featured1 .item-0 .entry-title{font-size:25px}
.font-size1 .featured1 .item-0 .entry-title{font-size:23px}
.featured1 .item-1 .entry-title{font-size:17px}
.featured2 .item-0{width:50%;height:402px}
.featured2 .item-1,.featured2 .item-2{margin:0 0 2px}
.featured2 .item-0 .entry-info{padding:20px}
.featured2 .item-0 .entry-title{font-size:25px}
.font-size1 .featured2 .item-0 .entry-title{font-size:23px}
.featured3 .featured-item{width:calc(100% / 3)}
.featured3 .item-0,.featured3 .item-1,.featured3 .item-2{margin:0 0 2px}
.featured3 .featured-item .entry-title{font-size:16px}
.featured4 .featured-item{width:calc(100% / 3);height:180px}
.featured4 .item-0,.featured4 .item-1{width:50%;height:220px;margin:0 0 2px}
.featured4 .featured-item .entry-title{font-size:16px}
.featured4 .item-0 .entry-title,.featured4 .item-1 .entry-title{font-size:19px}
.featured5 .featured-item{width:calc(100% / 3)}
.featured5 .item-0{height:402px}
.featured5 .item-1,.featured5 .item-2{margin:0 0 2px}
.featured5 .featured-item .entry-title{font-size:16px}
.featured6 .featured-item{width:calc(100% / 3);height:402px}
.featured6 .featured-item .entry-title{font-size:16px}
.title-wrap,.block-posts .widget > .widget-title{position:relative;float:left;width:100%;height:30px;display:block;margin:0 0 25px;border-bottom:2px solid <?php echo $theme_colour_one; ?>}
.title-wrap > h3,.block-posts .widget > .widget-title > h3{position:relative;float:left;height:30px;background-color:<?php echo $theme_colour_one; ?>;font-size:14px;color:#ffffff;font-weight:700;line-height:32px;text-transform:uppercase;padding:0 13px;margin:0}
.rtl .title-wrap > h3,.rtl .block-posts .widget > .widget-title > h3{float:right}
.title-wrap > a.more,.widget-title > a.more{float:right;font-size:13px;color:#aaaaaa;line-height:30px;padding:0}
.more1 .title-wrap > a.more,.more1 .widget-title > a.more{font-family:var(--meta-font)}
.rtl .title-wrap > a.more,.rtl .widget-title > a.more{float:left}
.title-wrap > a.more:hover,.block-posts .widget > .widget-title > a.more:hover{color:<?php echo $theme_colour_two; ?>}
.block-posts .widget{display:none;position:relative;float:left;width:100%;margin:0 0 35px}
#block-posts-2 .widget:first-child{margin:35px 0}
#block-posts-2 .widget:last-child{margin-bottom:0}
.block-posts .show-ify{display:block}
.block-posts .widget-content{position:relative;float:left;width:100%;display:block}
.block-posts .loader{height:180px}
.block-posts-1 .block-item{position:relative;float:left;width:calc((100% - 30px) / 2);overflow:hidden;padding:0;margin:20px 0 0}
.rtl .block-posts-1 .block-item{float:right}
.block-posts-1 .item-0{margin:0 30px 0 0}
.rtl .block-posts-1 .item-0{margin:0 0 0 30px}
.block-posts-1 .item-1{margin:0}
.block-posts-1 .block-inner{position:relative;width:100%;height:320px;overflow:hidden}
.block-posts-1 .entry-image-link{position:relative;width:85px;height:65px;float:left;display:block;overflow:hidden;margin:0 12px 0 0}
.rtl .block-posts-1 .entry-image-link{float:right;margin:0 0 0 12px}
.block-posts-1 .block-inner .entry-image-link{width:100%;height:100%;margin:0}
.block-posts-1 .entry-header{overflow:hidden}
.block-posts-1 .entry-category{position:relative;top:auto;left:auto;right:auto;margin:0}
.block-posts-1 .entry-title{font-size:14px;font-weight:700;line-height:1.4em;margin:0 0 3px}
.font-size1 .block-posts-1 .entry-title{font-size:13px}
.block-posts-1 .entry-info .entry-title{font-size:17px;margin:10px 0 5px}
.block-posts-1 .entry-info .entry-title a{color:#fff}
.block-posts-1 .entry-info .entry-meta{color:#ccc}
.block-posts-1 .entry-info .entry-meta .by{color:#f2f2f2}
.block-posts-2 .block-grid{position:relative;display:flex;flex-wrap:wrap;margin:0 -10px}
.block-posts-2 .block-item{position:relative;float:left;width:calc(100% / 3);box-sizing:border-box;padding:0 10px;margin:20px 0 0}
.rtl .block-posts-2 .block-item{float:right}
.block-posts-2 .item-0{float:none;display:block;width:100%;padding:0;margin:0 0 5px}
.rtl .block-posts-2 .item-0{float:none}
.block-posts-2 .block-inner{position:relative;width:100%;height:320px;overflow:hidden}
.block-posts-2 .entry-image{position:relative}
.block-posts-2 .entry-image-link{width:100%;height:130px;position:relative;display:block;overflow:hidden}
.block-posts-2 .item-0 .entry-image-link{height:100%;margin:0}
.block-posts-2 .entry-header{overflow:hidden}
.block-posts-2 .entry-title{font-size:14px;font-weight:700;line-height:1.4em;margin:8px 0 3px}
.font-size1 .block-posts-2 .entry-title{font-size:13px}
.block-posts-2 .item-0 .entry-info{padding:20px}
.block-posts-2 .item-0 .entry-category{position:relative;top:auto;left:auto;right:auto;margin:0}
.block-posts-2 .item-0 .entry-title{font-size:25px;margin:10px 0 5px}
.font-size1 .block-posts-2 .item-0 .entry-title{font-size:23px}
.block-posts-2 .item-0 .entry-title a{color:#fff}
.block-posts-2 .item-0 .entry-meta{color:#ccc}
.block-posts-2 .item-0 .entry-meta .by{color:#f2f2f2}
.block-posts .block-column{width:calc((100% - 30px) / 2)}
.block-posts .column-left{float:left}
.block-posts .column-right{float:right}
.block-column .column-item{position:relative;float:left;width:100%;overflow:hidden;padding:0;margin:20px 0 0}
.block-column .column-item.item-0{margin:0 0 5px}
.column-inner{position:relative;width:100%;height:200px;overflow:hidden}
.column-posts .entry-image-link{position:relative;width:85px;height:65px;float:left;display:block;overflow:hidden;margin:0 12px 0 0}
.rtl .column-posts .entry-image-link{float:right;margin:0 0 0 12px}
.column-inner .entry-image-link{width:100%;height:100%;margin:0}
.column-posts .entry-header{overflow:hidden}
.column-posts .entry-category{position:relative;top:auto;left:auto;right:auto;margin:0}
.column-posts .entry-title{font-size:14px;font-weight:700;line-height:1.4em;margin:0 0 3px}
.font-size1 .column-posts .entry-title{font-size:13px}
.column-posts .entry-info .entry-title{font-size:17px;margin:10px 0 5px}
.column-posts .entry-info .entry-title a{color:#fff}
.column-posts .entry-info .entry-meta{color:#ccc}
.column-posts .entry-info .entry-meta .by{color:#f2f2f2}
.grid-posts-1{position:relative;overflow:hidden;display:flex;flex-wrap:wrap;padding:0;margin:0 -10px}
.grid-posts-1 .grid-item{position:relative;float:left;width:calc(100% / 3);box-sizing:border-box;padding:0 10px;margin:20px 0 0}
.rtl .grid-posts-1 .grid-item{flaot:right}
.grid-posts-1 .grid-item.item-0,.grid-posts-1 .grid-item.item-1,.grid-posts-1 .grid-item.item-2{margin:0}
.grid-posts-1 .entry-image{position:relative}
.grid-posts-1 .entry-image-link{width:100%;height:130px;position:relative;display:block;overflow:hidden}
.grid-posts-1 .entry-title{font-size:14px;font-weight:700;line-height:1.4em;margin:8px 0 3px}
.font-size1 .grid-posts-1 .entry-title{font-size:13px}
.grid-posts-2{position:relative;overflow:hidden;display:flex;flex-wrap:wrap;padding:0;margin:0 -15px}
.grid-posts-2 .grid-item{position:relative;float:left;width:50%;box-sizing:border-box;padding:0 15px;margin:30px 0 0}
.rtl .grid-posts-2 .grid-item{float:right}
.grid-posts-2 .grid-item.item-0,.grid-posts-2 .grid-item.item-1{margin:0}
.grid-posts-2 .entry-image{position:relative}
.grid-posts-2 .entry-image-link{width:100%;height:180px;position:relative;display:block;overflow:hidden}
.grid-posts-2 .entry-title{font-size:19px;font-weight:700;line-height:1.4em;margin:10px 0 5px}
.font-size1 .grid-posts-2 .entry-title{font-size:18px}
.block-carousel{position:relative;overflow:hidden}
.block-carousel .carousel-item{position:relative;float:left;width:100%;overflow:hidden;box-sizing:border-box;padding:0;margin:0}
.rtl .block-carousel .carousel-item{float:right}
.block-carousel .entry-image{position:relative}
.block-carousel .entry-image-link{width:100%;height:130px;position:relative;display:block;overflow:hidden}
.block-carousel .entry-title{font-size:14px;font-weight:700;line-height:1.4em;margin:8px 0 3px}
.font-size1 .block-carousel .entry-title{font-size:13px}
.block-carousel .owl-nav{position:relative;float:left;margin:15px 0 0}
.rtl .block-carousel .owl-nav{float:right}
.block-carousel .owl-prev,.block-carousel .owl-next{width:22px;height:22px;line-height:20px;z-index:10}
.block-carousel .owl-prev{margin:0 4px 0 0}
.rtl .block-carousel .owl-prev{margin:0 0 0 4px}
.block-videos{position:relative;overflow:hidden;display:flex;flex-wrap:wrap;padding:0;margin:0 -10px}
.block-videos .videos-item{position:relative;float:left;width:calc(100% / 3);overflow:hidden;box-sizing:border-box;padding:0 10px;margin:20px 0 0}
.rtl .block-videos .videos-item{float:right}
.block-videos .videos-item.item-0,.block-videos .videos-item.item-1,.block-videos .videos-item.item-2{margin:0}
.block-videos .entry-image-link{width:100%;height:130px;position:relative;display:block;overflow:hidden}
.block-videos .videos-inner:hover .entry-image-link:after{opacity:1}
.block-videos .entry-title{font-size:14px;font-weight:700;line-height:1.4em;margin:8px 0 3px}
.font-size1 .block-videos .entry-title{font-size:13px}
.block-videos .video-icon{position:absolute;top:calc(50% - (34px / 2));right:calc(50% - (34px / 2));background-color:rgba(0,0,0,0.5);height:34px;width:34px;color:#fff;font-size:12px;text-align:center;line-height:32px;z-index:5;margin:0;box-sizing:border-box;border:2px solid #fff;border-radius:100%;opacity:.85;transition:opacity .25s ease}
.block-videos .video-icon:after{content:'\f04b';display:block;font-family:'Font Awesome 5 Free';font-weight:900;padding:0 0 0 3px}
.block-videos .videos-item:hover .video-icon{opacity:1}
#home-ad .widget{position:relative;float:left;width:100%;line-height:0;margin:0 0 35px}
#home-ad .widget > .widget-title{display:none!important}
#custom-ads{float:left;width:100%;opacity:0;visibility:hidden;margin:0}
#before-ad,#after-ad{float:left;width:100%;margin:0}
#before-ad .widget > .widget-title > h3,#after-ad .widget > .widget-title > h3{height:auto;font-size:10px;color:#aaaaaa;font-weight:400;line-height:1;text-transform:inherit;margin:0 0 5px}
#before-ad .widget,#after-ad .widget{width:100%;margin:25px 0 0}
#before-ad .widget-content,#after-ad .widget-content{position:relative;width:100%;line-height:1}
#new-before-ad #before-ad,#new-after-ad #after-ad{float:none;display:block;margin:0}
#new-before-ad #before-ad .widget,#new-after-ad #after-ad .widget{margin:0}
.item-post .FollowByEmail{box-sizing:border-box}
#main-wrapper #main{float:left;width:100%;box-sizing:border-box}
.queryMessage{overflow:hidden;color:<?php echo $theme_colour_one; ?>;font-size:14px;padding:0 0 15px;margin:0 0 35px;border-bottom:1px solid rgba(155,155,155,0.13)}
.queryMessage .query-info{margin:0}
.queryMessage .search-query,.queryMessage .search-label{font-weight:600;text-transform:uppercase}
.queryMessage .search-query:before,.queryMessage .search-label:before{content:"\201c"}
.queryMessage .search-query:after,.queryMessage .search-label:after{content:"\201d"}
.queryMessage a.show-more{float:right;color:<?php echo $theme_colour_two; ?>;text-decoration:underline}
.queryMessage a.show-more:hover{color:<?php echo $theme_colour_one; ?>;text-decoration:none}
.queryEmpty{font-size:13px;font-weight:400;padding:0;margin:40px 0;text-align:center}
.blog-post{display:block;overflow:hidden;word-wrap:break-word}
.item .blog-post{float:left;width:100%}
.index-post-wrap{position:relative;display:flex;flex-wrap:wrap;margin:0 -15px}
.index-post{position:relative;float:left;width:50%;box-sizing:border-box;padding:0 15px;margin:30px 0 0}
.rtl .index-post{float:right}
.blog-posts .index-post:nth-child(1),.blog-posts .index-post:nth-child(2){margin:0}
.index-post .entry-header{overflow:hidden}
.index-post .entry-title{font-size:19px;font-weight:700;line-height:1.4em;margin:10px 0 5px}
.font-size1 .index-post .entry-title{font-size:18px}
.index-post .entry-image{position:relative;width:100%;height:180px;overflow:hidden;margin:0}
.index-post .entry-image-link{position:relative;float:left;width:100%;height:100%;z-index:1;overflow:hidden}
.inline-ad-wrap{position:relative;float:left;width:100%;margin:0}
.inline-ad{position:relative;float:left;width:100%;text-align:center;line-height:1;margin:0}
.item-post-inner{position:relative;float:left;width:100%;overflow:hidden;box-sizing:border-box;padding:0}
#breadcrumb{font-family:var(--meta-font);font-size:12px;font-weight:400;color:#aaaaaa;margin:0 0 10px}
#breadcrumb a{color:#aaaaaa;transition:color .25s}
#breadcrumb a.home{color:<?php echo $theme_colour_two; ?>}
#breadcrumb a:hover{color:<?php echo $theme_colour_two; ?>}
#breadcrumb a,#breadcrumb em{display:inline-block}
#breadcrumb .delimiter:after{content:'\f054';font-family:'Font Awesome 5 Free';font-size:9px;font-weight:900;font-style:normal;margin:0 3px}
.rtl #breadcrumb .delimiter:after{content:'\f053'}
.item-post .blog-entry-header{position:relative;float:left;width:100%;overflow:hidden;padding:0; margin-bottom:1em;}
.item-post .blog-entry-header .entry-meta{font-size:13px}
.item-post h1.entry-title{font-size:24px;line-height:1.4em;font-weight:700;position:relative;display:block;margin:0 0 13px}
.static_page .item-post h1.entry-title{margin:0}
.item-post .post-body{position:relative;float:left;width:100%;overflow:hidden;font-family:var(--body-font);font-size:15px;color:#656565;line-height:1.6em;padding:25px 0 0;margin:0}
.post-body h1,.post-body h2,.post-body h3,.post-body h4{font-size:18px;color:<?php echo $theme_colour_one; ?>;margin:0 0 15px}
.post-body h1,.post-body h2{font-size:23px}
.post-body h3{font-size:21px}
blockquote{background-color:rgba(155,155,155,0.05);color:<?php echo $theme_colour_one; ?>;font-style:italic;padding:15px 25px;margin:0;border-left:1px solid <?php echo $theme_colour_two; ?>}
.rtl blockquote{border-left:0;border-right:1px solid <?php echo $theme_colour_two; ?>}
blockquote:before,blockquote:after{display:inline-block;font-family:'Font Awesome 5 Free';font-style:normal;font-weight:900;color:<?php echo $theme_colour_one; ?>;line-height:1}
blockquote:before,.rtl blockquote:after{content:'\f10d';margin:0 10px 0 0}
blockquote:after,.rtl blockquote:before{content:'\f10e';margin:0 0 0 10px}
.post-body ul,.widget .post-body ol{line-height:1.5;font-weight:400;padding:0 0 0 15px;margin:10px 0}
.rtl .post-body ul,.rtl .widget .post-body ol{padding:0 15px 0 0}
.post-body li{margin:5px 0;padding:0;line-height:1.5}
.post-body ul li{list-style:disc inside}
.post-body ol li{list-style:decimal inside}
.post-body u{text-decoration:underline}
.post-body strike{text-decoration:line-through}
.post-body a{color:<?php echo $theme_colour_two; ?>}
.post-body a:hover{text-decoration:underline}
.post-body a.button{display:inline-block;height:32px;background-color:<?php echo $theme_colour_two; ?>;font-family:var(--body-font);font-size:14px;color:#ffffff;font-weight:400;line-height:32px;text-align:center;text-decoration:none;cursor:pointer;padding:0 15px;margin:0 5px 5px 0;border-radius:2px}
.rtl .post-body a.button{margin:0 0 5px 5px}
.post-body a.colored-button{color:#fff}
.post-body a.button:hover{background-color:<?php echo $theme_colour_one; ?>;color:#ffffff}
.post-body a.colored-button:hover{background-color:<?php echo $theme_colour_one; ?>!important;color:#ffffff!important}
.button:before{font-family:'Font Awesome 5 Free';font-weight:900;display:inline-block;margin:0 5px 0 0}
.rtl .button:before{margin:0 0 0 5px}
.button.preview:before{content:"\f06e"}
.button.download:before{content:"\f019"}
.button.link:before{content:"\f0c1"}
.button.cart:before{content:"\f07a"}
.button.info:before{content:"\f06a"}
.button.share:before{content:"\f1e0"}
.alert-message{position:relative;display:block;padding:15px;border:1px solid rgba(155,155,155,0.17);border-radius:2px}
.alert-message.alert-success{background-color:rgba(34,245,121,0.03);border:1px solid rgba(34,245,121,0.5)}
.alert-message.alert-info{background-color:rgba(55,153,220,0.03);border:1px solid rgba(55,153,220,0.5)}
.alert-message.alert-warning{background-color:rgba(185,139,61,0.03);border:1px solid rgba(185,139,61,0.5)}
.alert-message.alert-error{background-color:rgba(231,76,60,0.03);border:1px solid rgba(231,76,60,0.5)}
.alert-message:before{font-family:'Font Awesome 5 Free';font-size:16px;font-weight:900;display:inline-block;margin:0 5px 0 0}
.rtl .alert-message:before{margin:0 0 0 5px}
.alert-message.alert-success:before{content:"\f058"}
.alert-message.alert-info:before{content:"\f05a"}
.alert-message.alert-warning:before{content:"\f06a"}
.alert-message.alert-error:before{content:"\f057"}
.post-body table{width:100%;overflow-x:auto;color:#212529;text-align:left;box-sizing:border-box;margin:0;border-collapse:collapse;border:1px solid rgba(155,155,155,0.15)}
.rtl .post-body table{text-align:right}
.post-body table td,.post-body table th{box-sizing:border-box;padding:5px 15px;border:1px solid rgba(155,155,155,0.15)}
.post-body table thead th{color:<?php echo $theme_colour_one; ?>;font-weight:500;vertical-align:bottom}
.post-body table tbody td{color:#656565}
.post-body table::-webkit-scrollbar{height:3px;background:rgba(155,155,155,0.1)}
.post-body table::-webkit-scrollbar-thumb{background:<?php echo $theme_colour_two; ?>;border-radius:3px}
.contact-form{overflow:hidden}
.contact-form .widget-title{display:none}
.contact-form .contact-form-name{width:calc(50% - 5px)}
.rtl .contact-form .contact-form-name{float:right}
.contact-form .contact-form-email{width:calc(50% - 5px);float:right}
.rtl .contact-form .contact-form-email{float:left}
.contact-form .contact-form-button-submit{font-family:var(--body-font)}
.code-box{position:relative;display:block;background-color:rgba(155,155,155,0.1);font-family:Monospace;font-size:13px;white-space:pre-wrap;line-height:1.4em;padding:10px;margin:0;border:1px solid rgba(155,155,155,0.3);border-radius:2px}
.entry-tags{overflow:hidden;float:left;width:100%;height:auto;position:relative;margin:25px 0 0}
.entry-tags span,.entry-tags a{float:left;height:22px;background-color:rgba(155,155,155,0.1);font-size:13px;color:<?php echo $theme_colour_one; ?>;font-weight:400;line-height:22px;padding:0 7px;margin:5px 7px 0 0;border-radius:2px}
.rtl .entry-tags span,.rtl .entry-tags a{float:right;margin:5px 0 0 7px}
.entry-tags span{background-color:<?php echo $theme_colour_one; ?>;color:#ffffff}
.entry-tags a:hover{background-color:<?php echo $theme_colour_two; ?>;color:#ffffff}
.post-share{position:relative;float:left;width:100%;overflow:hidden;padding:0;margin:30px 0 0}
ul.share-links{position:relative}
.share-links li{float:left;overflow:hidden;margin:0 7px 0 0}
.rtl .share-links li{float:right;margin:0 0 0 7px}
.share-links li a{display:block;cursor:pointer;width:34px;height:32px;line-height:32px;color:#fff !important;font-size:14px;font-weight:400;text-align:center;border-radius:2px}
.share-links li a.facebook,.share-links li a.twitter{width:auto}
.share-links li a.facebook:before,.share-links li a.twitter:before{width:32px;background-color:rgba(255,255,255,0.05)}
.share-links li a span{font-size:13px;padding:0 13px}
.share-links li a:hover{opacity:.8}
.share-links .show-hid a{background-color:rgba(155,155,155,0.1);font-size:14px;color:#888}
.share-links .show-hid a:before{content:'\f067';font-family:'Font Awesome 5 Free';font-weight:900}
.show-hidden .show-hid a:before{content:'\f068'}
.share-links li.pinterest-p,.share-links li.linkedin,.share-links li.whatsapp,.share-links li.telegram{display:none}
.show-hidden li.pinterest-p,.show-hidden li.linkedin,.show-hidden li.whatsapp,.show-hidden li.telegram{display:inline-block}
.post-footer{position:relative;float:left;width:100%;box-sizing:border-box;padding:0}
#related-wrap{overflow:hidden;float:left;width:100%;box-sizing:border-box;padding:0;margin:35px 0 0}
#related-wrap .related-tag{display:none}
.galaxymag-related-content{float:left;width:100%}
.galaxymag-related-content .loader{height:200px}
.related-posts{position:relative;flex-wrap:wrap;margin:0 -10px;padding:0}
.related-posts .related-item{position:relative;float:left;width:calc(100% / 3);overflow:hidden;box-sizing:border-box;padding:0 10px;margin:20px 0 0}
.related-posts .related-item.item-0,.related-posts .related-item.item-1,.related-posts .related-item.item-2{margin:0}
.related-posts .related-item-inner{position:relative;width:100%;display:block}
.related-posts .entry-image{position:relative}
.related-posts .entry-image-link{position:relative;width:100%;height:130px;margin:0}
.related-posts .entry-title{font-size:14px;font-weight:700;line-height:1.4em;display:block;margin:8px 0 3px}
.font-size1 .related-posts .entry-title{font-size:13px}
.about-author{position:relative;float:left;width:100%;overflow:hidden;box-sizing:border-box;padding:20px;margin:35px 0 0;border:1px solid rgba(155,155,155,0.17)}
.about-author .avatar-container{position:relative;float:left;width:60px;height:60px;background-color:rgba(155,155,155,0.1);overflow:hidden;margin:0 17px 0 0;border-radius:100%}
.rtl .about-author .avatar-container{float:right;margin:0 0 0 17px}
.about-author .author-avatar{float:left;width:100%;height:100%;background-size:100% 100%;background-position:0 0;background-repeat:no-repeat;opacity:0;overflow:hidden;border-radius:100%;transition:opacity .25s ease}
.about-author .author-avatar.lazy-ify{opacity:1}
.about-author .author-name{display:block;font-size:18px;font-weight:700;margin:0 0 10px}
.about-author .author-name span{color:<?php echo $theme_colour_one; ?>}
.about-author .author-name a{color:<?php echo $theme_colour_two; ?>}
.about-author .author-name a:hover{color:<?php echo $theme_colour_one; ?>;text-decoration:none}
.author-description{overflow:hidden}
.author-description span{display:block;overflow:hidden;font-size:14px;color:#656565;font-weight:400;line-height:1.6em}
.author-description span br{display:none}
.author-description a{display:none;float:left;font-size:14px;color:<?php echo $theme_colour_one; ?>;text-align:center;padding:0;margin:12px 13px 0 0}
.rtl .author-description a{float:right;margin:12px 0 0 13px}
.author-description a:hover{color:<?php echo $theme_colour_two; ?>}
.author-description.show-icons li,.author-description.show-icons a{display:inline-block}
.post-nav{position:relative;float:left;width:100%;overflow:hidden;font-family:var(--meta-font);font-size:13px;box-sizing:border-box;margin:35px 0 0}
.post-nav a{color:#aaaaaa}
.post-nav a:hover{color:<?php echo $theme_colour_two; ?>}
.post-nav span{color:#aaaaaa;opacity:.8}
.post-nav .blog-pager-newer-link:before,.post-nav .blog-pager-older-link:after{margin-top:1px}
.post-nav .blog-pager-newer-link,.rtl .post-nav .blog-pager-older-link{float:left}
.post-nav .blog-pager-older-link,.rtl .post-nav .blog-pager-newer-link{float:right}
.post-nav .blog-pager-newer-link:before,.rtl .post-nav .blog-pager-older-link:after{content:'\f053';float:left;font-family:'Font Awesome 5 Free';font-size:9px;font-weight:900;margin:0 4px 0 0}
.post-nav .blog-pager-older-link:after,.rtl .post-nav .blog-pager-newer-link:before{content:'\f054';float:right;font-family:'Font Awesome 5 Free';font-size:9px;font-weight:900;margin:0 0 0 4px}
#blog-pager{float:left;width:100%;font-size:15px;font-weight:600;text-align:center;clear:both;box-sizing:border-box;padding:0;margin:35px 0 0}
#blog-pager .load-more{display:inline-block;height:28px;font-size:13px;color:#aaaaaa;font-weight:400;line-height:28px;padding:0 13px;border:1px solid rgba(155,155,155,0.17)}
#blog-pager #load-more-link{color:<?php echo $theme_colour_one; ?>;cursor:pointer}
#blog-pager #load-more-link:hover{background-color:<?php echo $theme_colour_two; ?>;color:#ffffff;bordder-color:<?php echo $theme_colour_two; ?>}
#blog-pager .load-more.no-more{background-color:rgba(155,155,155,0.05)}
#blog-pager .loading,#blog-pager .no-more{display:none}
#blog-pager .loading .loader{height:30px}
#blog-pager .no-more.show{display:inline-block}
#blog-pager .loading .loader:after{width:26px;height:26px;margin:-15px 0 0 -15px}
.galaxymag-blog-post-comments{display:none;float:left;width:100%;box-sizing:border-box;padding:0;margin:0}
#comments,#disqus_thread{float:left;width:100%}
.galaxymag-blog-post-comments .fb_iframe_widget_fluid_desktop, .galaxymag-blog-post-comments .fb_iframe_widget_fluid_desktop span, .galaxymag-blog-post-comments .fb_iframe_widget_fluid_desktop iframe{float:left;display:block!important;width:100%!important}
.comments-system-facebook{width:calc(100% + 16px);margin-left:-8px}
.fb-comments{padding:0;margin:35px 0 0}
.comments{display:block;clear:both;padding:0;margin:35px 0 0}
.comments-system-disqus .comments{margin:25px 0 0}
.comments .comments-content{float:left;width:100%;margin:0}
#comments h4#comment-post-message{display:none}
.comments .comment-block{padding:0 0 0 50px}
.rtl .comments .comment-block{padding:0 50px 0 0}
.comments .comment-content{font-family:var(--text-font);font-size:14px;color:#656565;line-height:1.6em;margin:8px 0 12px}
.comments .comment-content > a:hover{text-decoration:underline}
.comment-thread .comment{position:relative;padding:0;margin:25px 0 0;list-style:none;border-radius:0}
.comment-thread ol{padding:0;margin:0}
.toplevel-thread ol > li:first-child{margin:0}
.comment-thread.toplevel-thread > ol > .comment > .comment-replybox-single iframe{box-sizing:border-box;padding:0 0 0 50px;margin:15px 0 0}
.comment-thread ol ol .comment:before{content:'\f3bf';position:absolute;left:-20px;top:-5px;font-family:'Font Awesome 5 Free';font-size:15px;color:rgba(155,155,155,0.17);font-weight:700;transform:rotate(90deg);margin:0}
.comment-thread .avatar-image-container{position:absolute;top:0;left:0;width:35px;height:35px;border-radius:100%;overflow:hidden}
.rtl .comment-thread .avatar-image-container{left:auto;right:0}
.avatar-image-container img{width:100%;height:100%;border-radius:100%}
.comments .comment-header .user{font-size:16px;color:<?php echo $theme_colour_one; ?>;display:inline-block;font-style:normal;font-weight:700;margin:0 0 3px}
.comments .comment-header .user a{color:<?php echo $theme_colour_one; ?>}
.comments .comment-header .user a:hover{color:<?php echo $theme_colour_two; ?>}
.comments .comment-header .icon.user{display:none}
.comments .comment-header .icon.blog-author{display:inline-block;font-size:12px;color:<?php echo $theme_colour_two; ?>;font-weight:400;vertical-align:top;margin:-3px 0 0 5px}
.rtl .comments .comment-header .icon.blog-author{margin:-3px 5px 0 0}
.comments .comment-header .icon.blog-author:before{content:'\f058';font-family:'Font Awesome 5 Free';font-weight:400}
.comments .comment-header .datetime{display:inline-block;font-family:var(--meta-font);margin:0 0 0 10px}
.rtl .comments .comment-header .datetime{margin:0 10px 0 0}
.comment-header .datetime a{font-size:11px;color:#aaaaaa;padding:0}
.comments .comment-actions{display:block;margin:0}
.comments .comment-actions a{color:<?php echo $theme_colour_two; ?>;font-size:13px;font-style:italic;margin:0 15px 0 0}
.rtl .comments .comment-actions a{margin:0 0 0 15px}
.comments .comment-actions a:hover{color:<?php echo $theme_colour_one; ?>}
.item-control{display:none}
.loadmore.loaded a{display:inline-block;border-bottom:1px solid rgba(155,155,155,.51);text-decoration:none;margin-top:15px}
.comments .continue{display:none}
.comments .toplevel-thread > #top-continue a{display:block;color:<?php echo $theme_colour_two; ?>;text-align:center;margin:35px 0 0}
.comments .toplevel-thread > #top-continue a:hover{color:<?php echo $theme_colour_one; ?>}
.comments .comment-replies{padding:0 0 0 50px}
.thread-expanded .thread-count a,.loadmore{display:none}
.comments .footer,.comments .comment-footer{float:left;width:100%;font-size:13px;margin:0}
.comments .comment-thread > .comment-replybox-thread{margin:25px 0 0}
.comment-form{float:left;width:100%;margin:0}
p.comments-message{font-size:15px;color:#aaaaaa;font-style:italic;padding:0 0 25px;margin:0}
p.comments-message > a{color:<?php echo $theme_colour_two; ?>}
p.comments-message > a:hover{text-decoration:underline}
p.comments-message > em{color:#d63031;font-style:normal}
.comment-form > p{display:none}
p.comment-footer span{color:#aaaaaa}
p.comment-footer span:after{content:'\002A';color:#d63031}
iframe#comment-editor{min-height:93px}
#sidebar-wrapper .sidebar{float:left;width:100%}
.sidebar > .widget{position:relative;float:left;width:100%;box-sizing:border-box;padding:0;margin:0 0 35px}
#sidebar3 > .widget:last-child{margin:0}
.sidebar .widget > .widget-title{position:relative;float:left;width:100%;height:30px;display:block;margin:0 0 25px;border-bottom:2px solid <?php echo $theme_colour_one; ?>}
.sidebar .widget > .widget-title > h3{position:relative;float:left;height:30px;background-color:<?php echo $theme_colour_one; ?>;font-size:14px;color:#ffffff;font-weight:700;line-height:32px;text-transform:uppercase;padding:0 13px;margin:0}
.rtl .sidebar .widget > .widget-title > h3{float:right}
.sidebar .widget-content{float:left;width:100%;box-sizing:border-box;padding:0}
.sidebar .loader{height:180px}
#sidebar-tabs{display:none;position:relative;overflow:hidden;box-sizing:border-box;padding:0;margin:0 0 35px}
.sidebar-tabs .select-tab{position:relative;width:100%;height:32px;background-color:<?php echo $theme_colour_one; ?>;overflow:hidden;margin:0 0 25px}
.sidebar-tabs .select-tab li{position:relative;float:left;display:inline-block;width:100%;height:32px;font-size:13px;color:#ffffff;font-weight:700;line-height:33px;text-align:center;text-transform:uppercase;cursor:pointer;list-style:none;margin:0;padding:0}
.rtl .sidebar-tabs .select-tab li{float:right}
.tabs-1 .select-tab li{position:relative;float:left;width:auto}
.tabs-1 .select-tab li,.tabs-1 .select-tab li a{cursor:auto}
.tabs-2 .select-tab li{width:50%}
.tabs-3 .select-tab li{width:calc(100% / 3)}
.tabs-4 .select-tab li{width:25%;font-size:11px}
.tabs-4 .select-tab li a{padding:0 5px}
.sidebar-tabs .select-tab li > a{color:#ffffff;display:block;padding:0 10px}
.tabs-1 .select-tab li > a{padding:0 13px}
.sidebar-tabs .select-tab li:hover,.sidebar-tabs .select-tab li.active,.sidebar-tabs .select-tab li.active:hover{background-color:<?php echo $theme_colour_two; ?>;color:#ffffff}
.sidebar-tabs .select-tab li.active a,.sidebar-tabs .select-tab li.active:hover a,.sidebar-tabs .select-tab li:hover a{color:#ffffff}
.sidebar-tabs .widget{display:none}
.sidebar-tabs .tab-active{display:block}
.sidebar-tabs .widget{padding:0;margin:0;border:0}
.sidebar-tabs > .widget > .widget-title{display:none}
ul.social-icons{display:flex;flex-wrap:wrap;margin:0 -2px}
.social-icons li{float:left;width:calc(100% / 3);box-sizing:border-box;padding:0 2px;margin:4px 0 0}
.rtl .social-icons li{float:right}
.social-icons li.link-0,.social-icons li.link-1,.social-icons li.link-2{margin:0}
.social-icons li a{float:left;width:100%;height:32px;font-size:15px;color:#fff;text-align:center;line-height:33px;padding:0;border-radius:2px}
.social-icons li a:before{float:left;width:32px;background-color:rgba(255,255,255,0.05)}
.rtl .social-icons li a:before{float:right}
.social-icons li a span{float:right;font-size:14px;padding:0 13px}
.font-size1 .social-icons li a span{font-size:13px}
.social-icons li a:hover{opacity:.85}
.custom-widget .custom-item{display:block;overflow:hidden;padding:0;margin:20px 0 0}
.custom-widget .custom-item.item-0{margin:0}
.custom-widget .entry-image-link{position:relative;float:left;width:85px;height:65px;overflow:hidden;margin:0 12px 0 0}
.rtl .custom-widget .entry-image-link{float:right;margin:0 0 0 12px}
.custom-widget .entry-image-link .entry-thumb{width:85px;height:65px}
.custom-widget .cmm-avatar{width:55px;height:55px;margin:0 12px 0 0;border-radius:50%}
.custom-widget .cmm-avatar .entry-thumb{border-radius:50%;width:55px;height:55px}
.custom-widget .cmm-snippet{display:block;font-size:12px;line-height:1.4em;margin:2px 0 0}
.custom-widget .entry-header{overflow:hidden}
.custom-widget .entry-title{font-size:14px;font-weight:700;line-height:1.4em;margin:0 0 3px}
.font-size1 .custom-widget .entry-title{font-size:13px}
.PopularPosts .popular-post{display:block;overflow:hidden;margin:20px 0 0}
.PopularPosts .popular-post.item-0{margin:0}
.PopularPosts .entry-image-link{position:relative;float:left;width:85px;height:65px;overflow:hidden;z-index:1;margin:0 12px 0 0}
.rtl .PopularPosts .entry-image-link{float:right;margin:0 0 0 12px}
.PopularPosts .entry-image-link .entry-thumb{width:85px;height:65px}
.PopularPosts .entry-header{overflow:hidden}
.PopularPosts .entry-title{font-size:14px;font-weight:700;line-height:1.4em;margin:0 0 3px}
.font-size1 .PopularPosts .entry-title{font-size:13px}
.FeaturedPost .entry-image-link{position:relative;float:left;width:100%;height:180px;z-index:1;overflow:hidden;margin:0}
.FeaturedPost .entry-header{float:left;margin:0}
.FeaturedPost .entry-title{font-size:19px;font-weight:700;line-height:1.4em;margin:10px 0 5px}
.font-size1 .FeaturedPost .entry-title{font-size:18px}
.FollowByEmail .widget-content{position:relative;box-sizing:border-box;padding:0;border:1px solid rgba(155,155,155,0.17)}
.FollowByEmail .widget-content-inner{padding:20px}
.follow-by-email-content{position:relative;z-index:5}
.follow-by-email-title{font-size:18px;color:<?php echo $theme_colour_one; ?>;margin:0 0 13px}
.follow-by-email-text{font-family:var(--text-font);font-size:13px;line-height:1.5em;margin:0 0 15px}
.follow-by-email-address{width:100%;height:34px;background-color:rgba(255,255,255,0.05);font-family:inherit;font-size:12px;color:#333;box-sizing:border-box;padding:0 10px;margin:0 0 10px;border:1px solid rgba(155,155,155,0.17);border-radius:2px}
.follow-by-email-address:focus{border-color:rgba(155,155,155,0.4)}
.follow-by-email-submit{width:100%;height:34px;background-color:<?php echo $theme_colour_two; ?>;font-family:inherit;font-size:15px;color:#ffffff;font-weight:400;line-height:34px;cursor:pointer;padding:0 20px;border:0;border-radius:2px}
.follow-by-email-submit:hover{background-color:<?php echo $theme_colour_one; ?>;color:#ffffff}
.list-label li,.archive-list li{position:relative;display:block}
.list-label li a,.archive-list li a{display:block;color:<?php echo $theme_colour_one; ?>;font-size:13px;font-weight:400;text-transform:capitalize;padding:5px 0}
.list-label li:first-child a,.archive-list li:first-child a{padding:0 0 5px}
.list-label li:last-child a,.archive-list li:last-child a{padding-bottom:0}
.list-label li a:hover,.archive-list li a:hover{color:<?php echo $theme_colour_two; ?>}
.list-label .label-count,.archive-list .archive-count{float:right;color:#aaaaaa;text-decoration:none;margin:1px 0 0 5px}
.rtl .list-label .label-count,.rtl .archive-list .archive-count{float:left;margin:1px 5px 0 0}
.cloud-label li{position:relative;float:left;margin:0 5px 5px 0}
.rtl .cloud-label li{float:right;margin:0 0 5px 5px}
.cloud-label li a{display:block;height:26px;background-color:rgba(155,155,155,0.1);color:<?php echo $theme_colour_one; ?>;font-size:12px;line-height:26px;font-weight:400;padding:0 10px;border-radius:2px}
.cloud-label li a:hover{background-color:<?php echo $theme_colour_two; ?>;color:#ffffff}
.cloud-label .label-count{display:none}
.BlogSearch .search-form{display:flex;background-color:rgba(255,255,255,0.05);padding:2px;border:1px solid rgba(155,155,155,0.17);border-radius:2px}
.BlogSearch .search-input{float:left;width:100%;height:32px;background-color:rgba(0,0,0,0);font-family:inherit;font-weight:400;font-size:13px;color:#656565;line-height:32px;box-sizing:border-box;padding:0 10px;margin:0;border:0}
.BlogSearch .search-input:focus{outline:none}
.BlogSearch .search-action{float:right;width:auto;height:32px;font-family:inherit;font-size:15px;font-weight:400;line-height:32px;cursor:pointer;box-sizing:border-box;background-color:<?php echo $theme_colour_two; ?>;color:#ffffff;padding:0 15px;border:0;border-radius:2px}
.BlogSearch .search-action:hover{background-color:<?php echo $theme_colour_one; ?>;color:#ffffff}
.Profile ul li{float:left;width:100%;margin:20px 0 0}
.Profile ul li:first-child{margin:0}
.Profile .profile-img{float:left;width:55px;height:55px;background-color:rgba(155,155,155,0.08);overflow:hidden;color:transparent!important;margin:0 12px 0 0;border-radius:50%}
.Profile .profile-datablock{margin:0}
.Profile .profile-info > .profile-link{display:inline-block;font-size:12px;color:<?php echo $theme_colour_two; ?>;font-weight:400;margin:3px 0 0}
.Profile .profile-info > .profile-link:hover{color:<?php echo $theme_colour_one; ?>}
.Profile .g-profile,.Profile .profile-data .g-profile{font-size:15px;color:<?php echo $theme_colour_one; ?>;font-weight:700;line-height:1.4em;margin:0 0 5px}
.Profile .g-profile:hover,.Profile .profile-data .g-profile:hover{color:<?php echo $theme_colour_two; ?>}
.Profile .profile-textblock{display:none}
.profile-data.location{font-family:var(--meta-font);font-size:12px;color:#aaaaaa;line-height:1.4em;margin:2px 0 0}
.galaxymag-widget-ready .PageList ul li,.galaxymag-widget-ready .LinkList ul li{position:relative;display:block}
.galaxymag-widget-ready .PageList ul li a,.galaxymag-widget-ready .LinkList ul li a{display:block;color:<?php echo $theme_colour_one; ?>;font-size:13px;font-weight:400;padding:5px 0}
.galaxymag-widget-ready .PageList ul li:first-child a,.galaxymag-widget-ready .LinkList ul li:first-child a{padding:0 0 5px}
.galaxymag-widget-ready .PageList ul li a:hover,.galaxymag-widget-ready .LinkList ul li a:hover{color:<?php echo $theme_colour_two; ?>}
.Text .widget-content{font-family:var(--text-font);font-size:13px;line-height:1.6em}
.Image.about-image > .widget-title{display:none}
.Image .image-caption{font-size:13px;line-height:1.6em;margin:10px 0 0;display:block}
.Image.about-image .image-caption{margin:15px 0 0}
.contact-form-widget form{font-family:inherit;font-weight:400}
.contact-form-name{float:left;width:100%;height:34px;background-color:rgba(255,255,255,0.05);font-family:inherit;font-size:13px;color:#656565;line-height:34px;box-sizing:border-box;padding:5px 10px;margin:0 0 10px;border:1px solid rgba(155,155,155,0.17);border-radius:2px}
.contact-form-email{float:left;width:100%;height:34px;background-color:rgba(255,255,255,0.05);font-family:inherit;font-size:13px;color:#656565;line-height:34px;box-sizing:border-box;padding:5px 10px;margin:0 0 10px;border:1px solid rgba(155,155,155,0.17);border-radius:2px}
.contact-form-email-message{float:left;width:100%;background-color:rgba(255,255,255,0.05);font-family:inherit;font-size:13px;color:#656565;box-sizing:border-box;padding:5px 10px;margin:0 0 10px;border:1px solid rgba(155,155,155,0.17);border-radius:2px}
.contact-form-button-submit{float:left;width:100%;height:34px;background-color:<?php echo $theme_colour_two; ?>;font-family:inherit;font-size:15px;color:#ffffff;font-weight:400;line-height:34px;cursor:pointer;box-sizing:border-box;padding:0 10px;margin:0;border:0;border-radius:2px}
.contact-form-button-submit:hover{background-color:<?php echo $theme_colour_one; ?>;color:#ffffff}
.contact-form-error-message-with-border{float:left;width:100%;background-color:rgba(0,0,0,0);font-size:12px;color:#e74c3c;text-align:left;line-height:12px;padding:3px 0;margin:10px 0;box-sizing:border-box;border:0}
.contact-form-success-message-with-border{float:left;width:100%;background-color:rgba(0,0,0,0);font-size:12px;color:#27ae60;text-align:left;line-height:12px;padding:3px 0;margin:10px 0;box-sizing:border-box;border:0}
.rtl .contact-form-error-message-with-border,.rtl .contact-form-success-message-with-border{text-align:right}
.contact-form-cross{cursor:pointer;margin:0 0 0 3px}
.rtl .contact-form-cross{margin:0 3px 0 0}
.contact-form-error-message,.contact-form-success-message{margin:0}
.contact-form-name:focus,.contact-form-email:focus,.contact-form-email-message:focus{background-color:rgba(155,155,155,0.05);border-color:rgba(155,155,155,0.4)}
#footer-wrapper{background-color:<?php echo $theme_colour_one; ?>;color:#aaaaaa;border-top:1px solid rgba(155,155,155,0.17)}
#footer-wrapper > .container{position:relative;overflow:hidden;margin:0 auto}
.footer-widgets-wrap{position:relative;display:flex;margin:0 -17.5px}
#footer-wrapper .footer{display:inline-block;float:left;width:calc(100% / 3);box-sizing:border-box;padding:40px 17.5px}
.rtl #footer-wrapper .footer{float:right}
#footer-wrapper .footer.no-items{padding:0 17.5px}
#footer-wrapper .footer .widget{float:left;width:100%;padding:0;margin:35px 0 0}
#footer-wrapper .footer .widget:first-child{margin:0}
.footer .widget > .widget-title > h3,.footer .follow-by-email-title{position:relative;color:#f2f2f2;font-size:15px;font-weight:700;text-transform:uppercase;margin:0 0 20px}
.footer .follow-by-email-title{margin:0 0 13px}
.footer .about-text > .widget-title{display:none}
.footer .loader{height:145px}
.footer .no-posts{color:#aaaaaa}
.footer .PopularPosts .widget-content .post:first-child,.footer .custom-widget li:first-child,.footer .cmm-widget li:first-child{padding:0}
.footer .entry-title a,.footer .LinkList ul li a,.footer .PageList ul li a,.footer .Profile .g-profile,.footer .Profile .profile-data .g-profile{color:#f2f2f2}
.footer .entry-title a:hover{color:<?php echo $theme_colour_two; ?>}
.footer .Profile .profile-info > .profile-link{color:<?php echo $theme_colour_two; ?>}
.footer .Profile .profile-info > .profile-link:hover{color:#f2f2f2}
.footer .LinkList ul li a:hover,.footer .PageList ul li a:hover,.footer .Profile .g-profile:hover,.footer .Profile .profile-data .g-profile:hover{color:<?php echo $theme_colour_two; ?>}
.footer .custom-widget .cmm-snippet,.footer .profile-data.location,.footer .Text .widget-content,.footer .Image .image-caption{color:#aaaaaa}
.footer .list-label li a,.footer .archive-list li a,.footer .PageList ul li a,.footer .LinkList ul li a{border-color:rgba(155,155,155,0.06)}
.footer .list-label li a,.footer .list-label li a:before,.footer .archive-list li a,.footer .archive-list li a:before{color:#f2f2f2}
.footer .list-label li > a:hover,.footer .archive-list li > a:hover,.footer .Text .widget-content a{color:<?php echo $theme_colour_two; ?>}
.footer .cloud-label li a{color:#f2f2f2}
.footer .cloud-label li a:hover{background-color:<?php echo $theme_colour_two; ?>;color:#ffffff}
.footer .contact-form-name,.footer .contact-form-email,.footer .contact-form-email-message,.footer .BlogSearch .search-input{color:#f2f2f2}
#about-section{position:relative;float:left;width:100%;display:flex;flex-wrap:wrap;margin:0;padding:35px 0;border-top:1px solid rgba(155,155,155,0.1)}
#about-section.no-items{padding:0;border:0}
.compact-footer #about-section{border:0}
#about-section .widget{position:relative;float:left;box-sizing:border-box;margin:0}
.rtl #about-section .widget{float:right}
#about-section .widget > widget-content{display:none}
#about-section .widget-content .widget-title > h3{position:relative;color:#f2f2f2;font-size:15px;font-weight:700;text-transform:uppercase;margin:0 0 10px}
#about-section .Image{width:70%;padding:0 35px 0 0}
.rtl #about-section .Image{padding:0 0 0 35px}
#about-section .Image .widget-content{position:relative;float:left;width:100%;margin:0}
#about-section .footer-logo{display:block;float:left;max-width:30%;height:34px;padding:19px 0;margin:0}
.rtl #about-section .footer-logo{float:right}
#about-section .footer-logo img{height:34px;vertical-align:middle}
#about-section .about-content{max-width:70%;display:block;float:left;padding:0 0 0 35px;box-sizing:border-box}
.rtl #about-section .about-content{float:right;padding:0 35px 0 0}
#about-section .Image .no-image .about-content{max-width:100%;padding:0 35px 0 0}
.rtl #about-section .Image .no-image .about-content{padding:0 0 0 35px}
#about-section .LinkList{float:right;width:30%}
.rtl #about-section .LinkList{float:left}
.about-section ul.social-footer{float:right;padding:20px 0 0}
.rtl .about-section ul.social-footer{float:left}
.about-section .social-footer li{float:left;margin:0 0 0 7px}
.rtl .about-section .social-footer li{float:right;margin:0 7px 0 0}
.about-section .social-footer li a{display:block;width:32px;height:32px;font-size:16px;color:#fff;text-align:center;line-height:32px;border-radius:2px}
.about-section .social-footer li a:hover{opacity:.85}
#sub-footer-wrapper{display:block;width:100%;background-color:#161619;color:#f2f2f2;overflow:hidden;height:auto; }
#sub-footer-wrapper .container{padding:15px 0;margin:0 auto 10px auto;overflow:hidden;height:40px;}
#footer-menu{float:right;position:relative;display:block}
.rtl #footer-menu{float:left}
#footer-menu .widget > .widget-title,#footer-copyright .widget > .widget-title{display:none}
#footer-menu ul li{float:left;display:inline-block;height:30px;padding:0;margin:0}
.rtl #footer-menu ul li{float:right}
#footer-menu ul li a{font-size:13px;font-weight:400;display:block;color:#f2f2f2;line-height:31px;padding:0;margin:0 0 0 25px}
.rtl #footer-menu ul li a{margin:0 25px 0 0}
#footer-menu ul li a:hover{color:<?php echo $theme_colour_two; ?>}
#sub-footer-wrapper .footer-copyright{font-size:13px;float:left;height:30px;line-height:31px;font-weight:400}
.rtl #sub-footer-wrapper .footer-copyright{float:right}
#sub-footer-wrapper .footer-copyright a{color:#f2f2f2}
#sub-footer-wrapper .footer-copyright a:hover{color:<?php echo $theme_colour_two; ?>}
.hidden-widgets{display:none;visibility:hidden}
.back-top{display:none;position:fixed;bottom:15px;right:15px;width:32px;height:32px;background-color:<?php echo $theme_colour_two; ?>;cursor:pointer;overflow:hidden;font-size:13px;color:#ffffff;text-align:center;line-height:32px;z-index:2;border-radius:2px}
.rtl .back-top{right:auto;left:15px}
.back-top:after{content:'\f077';position:relative;font-family:'Font Awesome 5 Free';font-weight:900}
.back-top:hover{opacity:.9;box-shadow:0 0 5px rgba(0,0,0,0.15)}
.error404 #main-wrapper{width:100%}
.error404 #sidebar-wrapper{display:none}
.errorWrap{color:<?php echo $theme_colour_one; ?>;text-align:center;padding:60px 0}
.errorWrap h3{font-size:160px;line-height:1em;margin:0 0 20px}
.errorWrap h4{font-size:25px;margin:0 0 20px}
.errorWrap p{margin:0 0 10px}
.errorWrap a{display:inline-block;height:32px;background-color:<?php echo $theme_colour_two; ?>;font-size:15px;color:#ffffff;font-weight:700;line-height:32px;padding:0 20px;margin:15px 0 0;border-radius:2px}
.errorWrap a:hover{background-color:<?php echo $theme_colour_one; ?>;color:#ffffff}
.cookie-choices-info{top:auto!important;bottom:0}
.normal h2.entry-title,.normal .sidebar-tabs .select-tab li,.normal #galaxymag-main-menu-nav > li > a,.normal .title-wrap > h3,.normal .about-author .author-name,.normal .comments .comment-header .user,.normal .mobile-menu ul li,.normal .follow-by-email-title{font-weight:400}
.normal .widget-title > h3{font-weight:400!important}
.medium h2.entry-title,.medium .sidebar-tabs .select-tab li,.medium #galaxymag-main-menu-nav > li > a,.medium .title-wrap > h3,.medium .about-author .author-name,.medium .comments .comment-header .user,.medium .mobile-menu ul li,.medium .follow-by-email-title{font-weight:500}
.medium .breaking-news .entry-title{font-weight:400}
.medium .widget-title > h3{font-weight:500!important}
.semibold h2.entry-title,.semibold .sidebar-tabs .select-tab li,.semibold #galaxymag-main-menu-nav > li > a,.semibold .title-wrap > h3,.semibold .about-author .author-name,.semibold .comments .comment-header .user,.semibold .mobile-menu ul li,.semibold .follow-by-email-title{font-weight:600}
.semibold .widget-title > h3{font-weight:600!important}
.semibold .sidebar-tabs .select-tab li{font-size:12px}
@media screen and (max-width: 1133px) {
#outer-wrapper{max-width:100%}
.row-x1{width:100%}
.navbar-wrap .navbar,#breaking-wrap .container,.header-ads-wrap .container,#featured-wrapper .container,#content-wrapper,#footer-wrapper > .container,#sub-footer-wrapper{box-sizing:border-box;padding:0 20px}
}
@media screen and (max-width: 980px) {
#main-wrapper{width:calc(100% - (30% + 35px))}
#sidebar-wrapper{width:30%}
}
@media screen and (max-width: 880px) {
.navbar-wrap .navbar{padding:0}
.main-logo-wrap{width:100%;text-align:center;z-index:15;margin:0}
.main-logo .header-widget,.main-logo .main-logo-img,.main-logo .blog-title{float:none;display:inline-block}
.nav-active #outer-wrapper{filter:blur(2px)}
.nav-active .back-top{opacity:0!important}
#outer-wrapper{transition:filter .17s ease}
.overlay,.show-mobile-menu,#slide-menu{display:block}
.nav-active .overlay{visibility:visible;opacity:1}
.show-search,.hide-search{width:auto;text-align:center;padding:0 20px}
#nav-search .search-input{padding:0 60px 0 20px}
.rtl #nav-search .search-input{padding:0 20px 0 60px}
.main-menu,.galaxymag-main-menu{display:none}
#main-wrapper,#sidebar-wrapper{width:100%}
#sidebar-wrapper{margin:35px 0 0}
.footer-widgets-wrap{display:block;overflow:hidden;padding:35px 0 0}
.compact-footer .footer-widgets-wrap{padding:0}
#footer-wrapper .footer{width:100%;padding:0 15px 35px}
#footer-wrapper .footer.no-items{padding:0 15px}
}
@media screen and (max-width: 680px) {
#breaking-sec .widget > .widget-title{font-size:0}
#breaking-sec .widget > .widget-title > h3:before,.rtl #breaking-sec .widget > .widget-title > h3:before{margin:0}
#breaking-sec .breaking-news{padding:0 0 0 10px}
.rtl #breaking-sec .breaking-news{padding:0 10px 0 0}
#featured-wrapper .container{padding:0}
#featured-sec .show-ify .widget-content,#featured-sec .featured-grid{height:auto!important}
#featured-sec .show-ify .loader{min-height:230px}
.featured-item{width:70%!important;height:150px!important;padding:0!important;margin:0 0 0 2px !important}
.rtl .featured-item{margin:0 2px 0 0 !important}
.featured-item.item-0{width:100%!important;height:230px!important;margin:0 0 2px!important}
.featured-item.item-1,.rtl .featured-item.item-1{margin:0!important}
.featured-item .entry-info{padding:15px!important}
.featured-item .entry-title{font-size:14px!important}
.featured-item.item-0 .entry-title{font-size:23px!important}
.featured-item .entry-meta{display:none}
.featured-item.item-0 .entry-meta{display:block}
.featured-scroll{position:relative;float:left;width:100%;height:150px;overflow:hidden;overflow-x:auto;white-space:nowrap;-webkit-overflow-scrolling:touch;margin:0}
.featured-scroll .featured-item{display:inline-block!important;float:none!important;white-space:normal!important}
.block-posts-1 .block-item{width:100%}
.block-posts-1 .item-0{width:100%;margin:0 0 5px}
.block-posts-1 .item-1{margin:20px 0 0}
.block-posts-1 .block-inner{height:200px}
.block-posts-2 .block-inner{height:200px}
.block-posts-2 .item-0 .entry-title,.font-size1 .block-posts-2 .item-0 .entry-title{font-size:17px}
.block-posts-2 .block-grid .block-item{width:50%}
.block-posts-2.total-4 .block-grid .block-item{width:100%}
.block-posts-2.total-4 .block-grid .entry-image-link{height:160px}
.block-posts-2.total-4 .block-grid .entry-title{margin:10px 0 3px}
.block-carousel .entry-image-link{height:160px}
.block-posts .block-column{width:100%}
.block-videos .videos-item{width:50%;padding:0 10px}
.block-videos .videos-item.item-2{margin:20px 0 0}
.block-videos.total-3 .videos-item{width:100%;padding:0 10px}
.block-videos.total-3 .videos-item.item-1{margin:20px 0 0}
.block-videos.total-3 .entry-image-link{height:160px}
.block-videos.total-3 .entry-title{margin:10px 0 3px}
.grid-posts-1 .grid-item{width:50%;padding:0 10px}
.grid-posts-1 .grid-item.item-2{margin:20px 0 0}
.grid-posts-1.total-3 .grid-item{width:100%;padding:0 10px}
.grid-posts-1.total-3 .grid-item.item-1{margin:20px 0 0}
.grid-posts-1.total-3 .entry-image-link{height:160px}
.grid-posts-1.total-3 .entry-title{margin:10px 0 3px}
.grid-posts-2 .grid-item{width:100%}
.grid-posts-2 .grid-item.item-1{margin:30px 0 0}
.index-post{width:100%}
.blog-posts .index-post:nth-child(2){margin:30px 0 0}
.related-posts .related-item{width:50%;padding:0 10px}
.related-posts .related-item.item-2{margin:20px 0 0}
.related-posts.total-3 .related-item{width:100%;padding:0 10px}
.related-posts.total-3 .related-item.item-1{margin:20px 0 0}
.related-posts.total-3 .entry-image-link{height:160px}
.related-posts.total-3 .entry-title{margin:10px 0 3px}
#about-section{text-align:center}
#about-section .Image,.rtl #about-section .Image{width:100%;padding:0}
#about-section .footer-logo,.rtl #about-section .footer-logo{display:inline-block;float:none;max-width:100%;padding:0 0 30px}
#about-section .about-content,.rtl #about-section .about-content,#about-section .Image .no-image .about-content,.rtl #about-section .Image .no-image .about-content{max-width:100%;padding:0}
#about-section .LinkList{width:100%}
.about-section ul.social-footer,.rtl .about-section ul.social-footer{float:none;display:block;padding:35px 0 0}
.about-section .social-footer li,.rtl .about-section .social-footer li{float:none;display:inline-block;margin:0 5px}
#sub-footer-wrapper .container{padding:20px 0}
#footer-menu,#sub-footer-wrapper .footer-copyright{width:100%;height:auto;line-height:inherit;text-align:center}
#footer-menu ul li,.rtl #footer-menu ul li{float:none;height:auto}
#footer-menu ul li a,.rtl #footer-menu ul li a{line-height:inherit;margin:0 10px}
#sub-footer-wrapper .footer-copyright .widget{padding:0 0 20px}
.post-body table{display:block}
}
@media screen and (max-width: 540px) {
.block-posts-2 .block-grid .entry-image-link,.grid-posts-1 .entry-image-link,.block-videos .entry-image-link,.related-posts .entry-image-link{height:120px}
.block-carousel .entry-title{margin:10px 0 3px}
}
@media screen and (max-width: 440px) {
.item-post h1.entry-title{font-size:25px}
.post-share{margin:25px 0 0}
.share-links li{margin:5px 5px 0 0}
.share-links li a.twitter{width:34px}
.share-links li a.twitter span{display:none}
.share-links li a.twitter:before{width:34px;background-color:rgba(0,0,0,0)}
.about-author .avatar-container{width:55px;height:55px;margin:0 15px 0 0}
.comments .comment-content iframe#youtube{height:180px}
}
@media screen and (max-width: 360px) {
#slide-menu{width:270px}
.featured-item{width:80%!important;height:130px!important}
.featured-item.item-0{width:100%!important;height:200px!important}
.featured-item.item-0 .entry-title{font-size:21px!important}
.featured-scroll{height:130px}
.block-posts-2 .block-grid .entry-image-link,.grid-posts-1 .entry-image-link,.block-videos .entry-image-link,.related-posts .entry-image-link{height:100px}
.item-post h1.entry-title{font-size:22px}
.about-author .author-name span{display:none}
.share-links li a,.share-links li a.twitter{width:32px}
.share-links li a.twitter:before{width:32px;background-color:rgba(0,0,0,0)}
.errorWrap h3{font-size:130px}
.comments .comment-content iframe#youtube{height:140px}
}
.pager > li active {
    background:red;
    color:white;
}
.owl-nav .owl-prev, .owl-nav .owl-next{
  <!-- margin: 2px!important; -->
  padding: 1px!important;
  background-color: #ffffff !important;
  color: <?php echo $theme_colour_two; ?>!important;
}
.owl-nav .owl-prev:hover, .owl-nav .owl-next:hover{
  <!-- margin: 2px !important; -->
  padding: 1px !important;
  background-color:<?php echo $theme_colour_two; ?>!important;
  color: #ffffff !important;
} 