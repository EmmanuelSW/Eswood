<?php


class Songs extends Controller
{

    public function index()
    {
        $songs = $this->model->getAllSongs();
        $amount_of_songs = $this->model->getAmountOfSongs();

        require APP . 'views/_templates/header.php';
        require APP . 'views/songs/index.php';
        require APP . 'views/_templates/footer.php';

    }


    public function addSong()
    {
        if (isset($_POST["submit_add_song"])) {
            $this->model->addSong($_POST["artist"], $_POST["track"],  $_POST["link"]);
        }

        header('location: ' . URL_WITH_INDEX_FILE . 'songs/index');

    }


    public function deleteSong($song_id)
    {

        if (isset($song_id)) {
            $this->model->deleteSong($song_id);
        }

        header('location: ' . URL_WITH_INDEX_FILE . 'songs/index');
    }


    public function editSong($song_id)
    {
        if (isset($song_id)) {

            $song = $this->model->getSong($song_id);

            require APP . 'views/_templates/header.php';
            require APP . 'views/songs/edit.php';
            require APP . 'views/_templates/footer.php';
        } else {
            header('location: ' . URL_WITH_INDEX_FILE . 'songs/index');
        }
    }


    public function updateSong()
    {

        if (isset($_POST["submit_update_song"])) {
            $this->model->updateSong($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']);
        }

        header('location: ' . URL_WITH_INDEX_FILE . 'songs/index');
    }


    public function ajaxGetStats()
    {
        $amount_of_songs = $this->model->getAmountOfSongs();
        echo $amount_of_songs;
    }

}
