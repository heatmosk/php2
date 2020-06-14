<?php

namespace app\models;

class Review extends Model
{
  protected $userId;
  protected $reviewText;
  protected $reviewRate;
  public function __construct($user, $text, $rate)
  {
    $this->userId = $user;
    $this->reviewText = $text;
    $this->reviewRate = $rate;
  }

  /**
   * Get the value of userId
   */
  public function getUserId()
  {
    return $this->userId;
  }

  /**
   * Set the value of userId
   *
   * @return  self
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;

    return $this;
  }

  /**
   * Get the value of reviewText
   */
  public function getReviewText()
  {
    return $this->reviewText;
  }

  /**
   * Set the value of reviewText
   *
   * @return  self
   */
  public function setReviewText($reviewText)
  {
    $this->reviewText = $reviewText;

    return $this;
  }

  /**
   * Get the value of reviewRate
   */
  public function getReviewRate()
  {
    return $this->reviewRate;
  }

  /**
   * Set the value of reviewRate
   *
   * @return  self
   */
  public function setReviewRate($reviewRate)
  {
    $this->reviewRate = $reviewRate;

    return $this;
  }
}
