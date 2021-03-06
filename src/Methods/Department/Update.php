<?php
/**
 * Created by PhpStorm.
 * User: xiewh
 * Date: 2018/3/9
 * Time: 下午3:47
 */

namespace HXSD\Ding\Methods\Department;


use HXSD\Ding\Constant\Request;
use HXSD\Ding\Foundation\BaseMethod;

class Update extends BaseMethod
{
    public function execute(array $params)
    {
        return $this->updateDepartment($this->setParams($params));
    }

    /**
     * 设置参数
     *
     * @param array $params
     * @return array
     */
    private function setParams(array $params)
    {
        foreach ($params as $key => $value) {
            if (empty($value) && $value !== false) {
                unset($params[$key]);
            } elseif (is_array($value)) {
                $params[$key] = implode('|', $value);
            }
        }
        return $params;
    }

    /**
     * 创建部门
     *
     * @param array $params
     * @return array
     * @throws \Exception
     */
    private function updateDepartment(array $params)
    {
        return $this->curlQuery(function () use ($params) {
            return $this->curl->post($this->getUrl(Request::PATH_DEPARTMENT['update']), $params);
        });
    }
}