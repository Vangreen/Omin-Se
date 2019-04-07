<?php
require_once("config.php");

$query = mysqli_query($conn, "Select id, description, edate from events");
while ($record = mysqli_fetch_array($query))
{
    $eid = $record['id'];
    $eds = $record['des'];
    $edate = $record['edate'];

    echo '
    <div class="col-lg-12 col-12 mx-lg-4">
            <div class="row pb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body mobile-centered mx-4">

                    <div class="row my-3">

                      <div class="col-md-6">

                        <p class="card-title"><i class="fas fa-subway mr-2"></i>';
        $q2 = mysqli_query($conn, "Select tags.name as tag from tags inner join evetag on evetag.fk_id_tag = tags.id where evetag.fk_id_event = '$eid'");
    while ($r2 = mysqli_fetch_array($q2))
    {
        echo $r2['tag'].",";
    }
        echo'</p>
                        <p class="card-text">'.$eds.'</p>
                        <div class="flex-row">
                          <a class="card-link"><i class="far fa-clock mr-1"></i>'.$edate.'</a>
                          <a class="card-link"><i class="fas fa-route mr-1"></i> '.rand(10, 50).' m od Ciebie</a>
                        </div>
                      </div>

                      <div class="col-md-6 vote-buttons">

                        <a href="#"><img src="img/negative-vote.png" alt="Zagłosuj przeciwko" class="vote-icon negative"></a>
                        <a href="#"><img src="img/positive-vote.png" alt="Zagłosuj za" class="vote-icon positive"></a>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>
    ';


}

?>