# laravel-phpjasperxml
A Laravel package to render jasperReports. This extension was based on PHPJasperXML

###Installation

Add the following lines to your composer.json file

```
...
  andjelko/laravel-phpjasperxml": "^1.0"
}
```

Then update your packages with:

```
composer update
```

Add the Service Provider to you config/app.php file

```
'providers' => [
  ...
  Andjelko\PhpJasperXML\JasperReportsServiceProvider::class,
]
```
And add an alias to the PHPJasperXML class

```
'aliases' => [
  ...
  'PHPJasperXML'  => Andjelko\PhpJasperXML\PHPJasperXML::class,
]
```

Create an includes folder on your app and save there your jrxml files.

Create a ReportController with the following code
```
<?php
namespace App\Http\Controllers;

use PHPJasperXML;
use Response;
class ReportController extends Controller {

    public function viewreport($reporte='')
    {
      $PHPJasperXML = new PHPJasperXML();
      //$PHPJasperXML->fontfamily='freeserif';
      $PHPJasperXML->load_xml_file("reports/".$reporte.".jrxml");
      $PHPJasperXML->transferDBtoArray();
      //Clean the end of the buffer before outputting the PDF
      ob_end_clean();
      //page output method I:standard output  D:Download file
      return Response::make($PHPJasperXML->outpage("I"));
    }

}

```
Then modify your app/routes/web.php file to add a route to access any report.

```
Route::get('report/{report}', 'ReportController@viewreport')->name('report.show');
```
