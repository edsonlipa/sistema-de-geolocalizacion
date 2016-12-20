<?php

/**
 * Created by PhpStorm.
 * User: edson
 * Date: 15/12/16
 * Time: 10:08 AM
$fecha=fecha;
$hora='hora';
$nombre='nombre';
$codigo='codigo';

 */
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$nombre=$_POST['nombre'];
$codigo=$_POST['codigo'];

echo'                                <li class="item">
                                            <div class="item-row">

                                                <div class="item-col item-col-title no-overflow">
                                                    <div>

                                                            <h4 class="item-title no-wrap"> '.$nombre.' </h4>

                                                    </div>
                                                </div>
                                                <div class="item-col item-col-title">
                                                    <div> '.$codigo.' </div>
                                                </div>
                                                <div class="item-col item-col-stats">

                                                    <div class="no-overflow">
                                                        <div class="item-stats" >'.$fecha.'</div>
                                                    </div>
                                                </div>
                                                <div class="item-col item-col-date">
                                                    <div>  '.$hora.' </div>
                                                </div>
                                            </div>
                                        </li>';