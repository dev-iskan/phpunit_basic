<?php

use App\Models\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
    protected $user;
    // for each test we need FRESH user object
    public function setUp(): void
    {
        $this->user = new User();
    }

    /** @test  */
   public function test_can_get_first_name()
   {
       $user = $this->user;

       $user->setFirstName($name = 'Billy');


       $this->assertEquals($user->getFirstName(), $name);
   }

   public function test_first_name_is_trimmed()
   {
       $user = $this->user;

       $user->setFirstName(($name = 'Billy').'        ');

       $this->assertEquals($user->getFirstName(), $name);
   }

   public function test_email_can_be_set()
   {
       $user = $this->user;

       $user->setEmail($email = 'billy@mail.com');

       $this->assertEquals($user->getEmail(), $email);
   }

   public function test_email_variables_contain_correct_value()
   {
       $user = $this->user;

       $user->setFirstName($name = 'Billy');
       $user->setEmail($email = 'billy@mail.com');

       $emailVariables = $user->getEmailVariables();

       $this->assertArrayHasKey('first_name', $emailVariables);
       $this->assertArrayHasKey('email', $emailVariables);

       $this->assertEquals($emailVariables['first_name'], $name);
       $this->assertEquals($emailVariables['email'], $email);
   }
}