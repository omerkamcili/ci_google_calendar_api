<?php $this->load->view('header');?>

<body>

    <div id="wrapper">

    	<?php $this->load->view('nav');?>

        <div id="page-wrapper">

            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Event List</h1>
                    </div>

            </div>

            <div class="row" style="margin-bottom:10px;">

            	<form action="/event/eventList" method="GET">

	            	<div class="col-lg-3"><label>Start Date:</label><input type="date" name="start" class="form-control"></div>

	            	<div class="col-lg-3"><label>End Date:</label><input type="date" name="end" class="form-control"></div>

	            	<div class="col-lg-3"><button style="margin-top:24px;" class="btn btn-primary" type="submit">Get Events</button></div>

	            </form>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?=$title;?>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Summary</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($events)):?>
                                    <tbody>
                                        <?php foreach($events as $key => $foo):?>
                                        <tr>
                                            <td><?=($key+1);?></td>
                                            <td><?=$foo['summary'];?></td>
                                            <td><?=$foo['start'];?></td>
                                            <td><?=$foo['end'];?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                    <?php else:?>
                                    <tbody><tr><td colspan="4">Please select date range</td></tr></tbody>
                                	<?php endif;?>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

    <?php $this->load->view('footer');?>

</body>

</html>