function print(div){
        var divContents = $(div).html();
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><title>Export PDF</title>');
        printWindow.document.write('<link rel="stylesheet" type="text/css" href="http://localhost/rh_module/assets/back_office/css/demo1/style.css">');
        printWindow.document.write('<link rel="stylesheet" type="text/css"href="http://localhost/rh_module/assets/back_office/vendors/flag-icon-css/css/flag-icon.min.css">');
        printWindow.document.write('<link rel="stylesheet"  type="text/css" href="http://localhost/rh_module/assets/back_office/fonts/feather-font/css/iconfont.css">');
        printWindow.document.write('<link rel="stylesheet" type="text/css" href="http://localhost/rh_module/assets/back_office/vendors/core/core.css">');
        printWindow.document.write('<style>body{background-color: red;}</style>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
}
