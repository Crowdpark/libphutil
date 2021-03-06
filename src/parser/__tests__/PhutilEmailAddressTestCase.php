<?php

/*
 * Copyright 2012 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * Test cases for @{class:PhutilEmailAddress} parser.
 *
 * @group testcase
 */
final class PhutilEmailAddressTestCase extends PhutilTestCase {

  public function testEmailParsing() {
    $email = new PhutilEmailAddress('Abraham Lincoln <alincoln@logcabin.com>');
    $this->assertEqual(
      'Abraham Lincoln',
      $email->getDisplayName());
    $this->assertEqual(
      'alincoln',
      $email->getLocalPart());
    $this->assertEqual(
      'logcabin.com',
      $email->getDomainName());
    $this->assertEqual(
      'alincoln@logcabin.com',
      $email->getAddress());

    $email = new PhutilEmailAddress('alincoln@logcabin.com');
    $this->assertEqual(
      null,
      $email->getDisplayName());
    $this->assertEqual(
      'alincoln',
      $email->getLocalPart());
    $this->assertEqual(
      'logcabin.com',
      $email->getDomainName());
    $this->assertEqual(
      'alincoln@logcabin.com',
      $email->getAddress());

    $email = new PhutilEmailAddress('"Abraham" <alincoln@logcabin.com>');
    $this->assertEqual(
      'Abraham',
      $email->getDisplayName());
    $this->assertEqual(
      'alincoln',
      $email->getLocalPart());
    $this->assertEqual(
      'logcabin.com',
      $email->getDomainName());
    $this->assertEqual(
      'alincoln@logcabin.com',
      $email->getAddress());

    $email = new PhutilEmailAddress('    alincoln@logcabin.com     ');
    $this->assertEqual(
      null,
      $email->getDisplayName());
    $this->assertEqual(
      'alincoln',
      $email->getLocalPart());
    $this->assertEqual(
      'logcabin.com',
      $email->getDomainName());
    $this->assertEqual(
      'alincoln@logcabin.com',
      $email->getAddress());

    $email = new PhutilEmailAddress('alincoln');
    $this->assertEqual(
      null,
      $email->getDisplayName());
    $this->assertEqual(
      'alincoln',
      $email->getLocalPart());
    $this->assertEqual(
      null,
      $email->getDomainName());
    $this->assertEqual(
      'alincoln',
      $email->getAddress());

    $email = new PhutilEmailAddress('alincoln <alincoln at logcabin dot com>');
    $this->assertEqual(
      'alincoln',
      $email->getDisplayName());
    $this->assertEqual(
      'alincoln at logcabin dot com',
      $email->getLocalPart());
    $this->assertEqual(
      null,
      $email->getDomainName());
    $this->assertEqual(
      'alincoln at logcabin dot com',
      $email->getAddress());

  }

}
