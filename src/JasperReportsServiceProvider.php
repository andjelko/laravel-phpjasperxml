<?php

namespace Andjelko\PhpJasperXML;

use Illuminate\Support\ServiceProvider;
include_once("tcpdf/tcpdf.php");
include_once("PHPJasperXML.php");
class JasperReportsServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('Andjelko\PhpJasperXML\PHPJasperXML', function ($app) {
          return new PHPJasperXML();
      });
    }
}
