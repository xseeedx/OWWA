<!-- < ?php
class FolderCreator
{
    private $folderName;
    private $folderPath;

    public function __construct($folderName, $folderPath)
    {
        $this->folderName = $folderName;
        $this->folderPath = $folderPath;
    }

    public function createFolder()
    {
        $fullPath = $this->folderPath . '/' . $this->folderName;

        $success = mkdir($fullPath);

        if ($success) {
            echo "Folder created successfully.";
        } else {
            echo "Failed to create the folder.";
        }
    }
}
? > -->
