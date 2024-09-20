<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderIssueReported extends Notification
{
    use Queueable;

    protected $issue;

    public function __construct($issue)
    {
        $this->issue = $issue;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Проблема с заказом была сообщена:')
                    ->line('Заказ ID: ' . $this->issue->order_id)
                    ->line('Проблема: ' . $this->issue->issue)
                    ->action('Просмотреть заказ', url('/orders/' . $this->issue->order_id))
                    ->line('Спасибо за использование нашего сервиса!');
    }
}
