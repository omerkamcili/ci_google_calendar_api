<?php $this->load->view('header');?>

<body>

    <div id="wrapper">

    	<?php $this->load->view('nav');?>

        <div id="page-wrapper">

            <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Event</h1>
                    </div>

            </div>

            <?php if(isset($message)) echo $message;?>

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            Add Event
                        </div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-lg-6">

                                	<form role="form" action="<?=base_url(uri_string());?>" method="POST">

                                		<div class="form-group">
                                            
                                            <label>Summary</label>

                                            <?php echo form_input( array( 'name' => 'summary', 'class' => 'form-control' , 'required' => true  ) );?>

                                        </div>

										<div class="form-group">
                                            
                                            <label class="col-lg-12" style="padding:0px;">Start Date / Time</label>

                                            <div class="col-lg-7" style="padding:0px;">

                                            	<?php echo form_input( array( 'name' => 'startDate', 'type' => 'date' , 'class' => 'form-control' , 'required' => 'true' ) );?>

                                            </div>

                                            <div class="col-lg-5" style="padding:0px;"> 

                                            	<?php echo form_input( array( 'name' => 'startTime', 'type' => 'time' , 'class' => 'form-control' , 'required' => 'true' ) );?>

                                            </div>

                                        </div>


										<div class="form-group">
                                            
                                            <label class="col-lg-12" style="padding:0px; margin-top:20px;">End Date / Time</label>

                                            <div class="col-lg-7" style="padding:0px;">

                                            	<?php echo form_input( array( 'name' => 'endDate', 'type' => 'date' , 'class' => 'form-control' , 'required' => 'true' ) );?>

                                            </div>

                                            <div class="col-lg-5" style="padding:0px;"> 

                                            	<?php echo form_input( array( 'name' => 'endTime', 'type' => 'time' , 'class' => 'form-control' , 'required' => 'true' ) );?>

                                            </div>

                                        </div>
										
                              			<div class="form-group">
                                            
                                            <label style="padding:0px; margin-top:20px;">Description</label>

                                            <?php echo form_textarea( array( 'name' => 'description', 'class' => 'form-control' , 'rows' => '5' ) );?>

                                        </div>

                                        <?php echo form_submit( array( 'value' => 'Save' , 'class' => 'btn btn-primary' , 'style' => 'margin-top:15px;' ) );?>

                                	</form>

                                </div>

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