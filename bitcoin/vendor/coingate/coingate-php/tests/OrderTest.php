<?php
namespace CoinGate;

class OrderTest extends TestCase
{
    public function testFindOrderNotFound()
    {
        $this->assertFalse(Merchant\Order::find(0, array(), self::getGoodAuthentication()));

        try {
            $this->assertFalse(Merchant\Order::findOrFail(0, array(), self::getGoodAuthentication()));
        } catch (\Exception $e) {
            $this->assertRegExp('/OrderNotFound/', $e->getMessage());
        }
    }

    public function testFindOrderFound()
    {
        $order = Merchant\Order::create(self::getGoodPostParams(), array(), self::getGoodAuthentication());
        $this->assertNotFalse(Merchant\Order::find($order->id, array(), self::getGoodAuthentication()));
    }

    public function testCreateOrderIsNotValid()
    {
        $this->assertFalse(Merchant\Order::create(array(), array(), self::getGoodAuthentication()));
        try {
            $this->assertFalse(Merchant\Order::createOrFail(array(), array(), self::getGoodAuthentication()));
        } catch (\Exception $e) {
            $this->assertRegExp('/OrderIsNotValid/', $e->getMessage());
        }
    }

    public function testCreateOrderValid()
    {
        $this->assertNotFalse(Merchant\Order::create(self::getGoodPostParams(), array(), self::getGoodAuthentication()));
    }

    public static function getGoodPostParams() {
        return array(
            'order_id'          => 'ORDER-1412759368',
            'price'             => 1050.99,
            'currency'          => 'USD',
            'receive_currency'  => 'EUR',
            'callback_url'      => 'http://localhost/bitcoin/callback?token=6tCENGUYI62ojkuzDPX7Jg',
            'cancel_url'        => 'http://localhost/bitcoin/cart',
            'success_url'       => 'http://localhost/bitcoin/account/orders',
            'description'       => 'Apple Iphone 6'
        );
    }
}