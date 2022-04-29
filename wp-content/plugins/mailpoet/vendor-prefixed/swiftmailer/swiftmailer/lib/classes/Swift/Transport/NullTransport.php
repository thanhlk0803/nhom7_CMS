<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Transport_NullTransport implements Swift_Transport
{
 private $eventDispatcher;
 public function __construct(Swift_Events_EventDispatcher $eventDispatcher)
 {
 $this->eventDispatcher = $eventDispatcher;
 }
 public function isStarted()
 {
 return \true;
 }
 public function start()
 {
 }
 public function stop()
 {
 }
 public function ping()
 {
 return \true;
 }
 public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
 {
 if ($evt = $this->eventDispatcher->createSendEvent($this, $message)) {
 $this->eventDispatcher->dispatchEvent($evt, 'beforeSendPerformed');
 if ($evt->bubbleCancelled()) {
 return 0;
 }
 }
 if ($evt) {
 $evt->setResult(Swift_Events_SendEvent::RESULT_SUCCESS);
 $this->eventDispatcher->dispatchEvent($evt, 'sendPerformed');
 }
 $count = \count((array) $message->getTo()) + \count((array) $message->getCc()) + \count((array) $message->getBcc());
 return $count;
 }
 public function registerPlugin(Swift_Events_EventListener $plugin)
 {
 $this->eventDispatcher->bindEventListener($plugin);
 }
}
