<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('password');
echo $this->Form->end(__('Submit'));