<?php

namespace App\Exceptions\Theme;

use Exception;

class ThemeAlreadyInstalledException extends Exception
{
    protected $code = 400; // Custom error code

    public function __construct($message = 'Theme already installed.')
    {
        parent::__construct($message, $this->code);
    }
}

class ZipFileNotFoundException extends Exception
{
    protected $code = 404; // Custom error code

    public function __construct($message = 'Zip file does not exist.')
    {
        parent::__construct($message, $this->code);
    }
}

class DirectoryAlreadyExistsException extends Exception
{
    protected $code = 409; // Custom error code

    public function __construct($message = 'Theme directory already exists.')
    {
        parent::__construct($message, $this->code);
    }
}

class ZipExtractionFailedException extends Exception
{
    protected $code = 500; // Custom error code

    public function __construct($message = 'Failed to unzip the file.')
    {
        parent::__construct($message, $this->code);
    }
}

class DefaultThemeCanNotBeDeleted extends Exception
{
    protected $code = 500; // Custom error code

    public function __construct($message = 'Default Theme Can Not Be Deleted')
    {
        parent::__construct($message, $this->code);
    }
}

class MissingRequiredFilesException extends Exception
{
    public function __construct($file)
    {
        parent::__construct("The required file or directory '{$file}' is missing in the zip file.");
    }
}

class ThemeJsonNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("Theme json not found");
    }
}

class InvalidThemeJsonException extends Exception
{
    public function __construct()
    {
        parent::__construct("Invalid theme json file");
    }
}

class ThemeJsonFileNotFoundException extends Exception
{
    protected $code = 500; // Custom error code

    public function __construct($message = 'Json file not found')
    {
        parent::__construct($message, $this->code);
    }
}

class ThemeJsonInvalidException extends Exception
{
    protected $code = 500; // Custom error code

    public function __construct($message = 'Invalid JSON file found')
    {
        parent::__construct($message, $this->code);
    }
}
