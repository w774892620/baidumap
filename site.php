<?php
/**
 * 百度地图模块微站定义
 *
 * @author jc
 * @url http://bbs.012wz.com/
 */
defined('IN_IA') or exit('Access Denied');

class Ceshi_5ModuleSite extends WeModuleSite {

	public function doMobileIndex() {
		//这个操作被定义用来呈现 功能封面
		global $_W,$_GPC;
		$sql="SELECT * FROM ".tablename('ceshi5_map')." WHERE weid = :weid ";
		$list = pdo_fetchall($sql,array(':weid' => $_W['uniacid']));//查询门店信息
		$data_info = json_encode($list);//转换为json格式的数据
		include $this->template('index');
	}
	public function doWebMap() {
		//这个操作被定义用来呈现 门店列表
		global $_W,$_GPC;
	    load()->func('tpl');
		$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
		if ($operation == 'display') {
			//门店列表
			$list = pdo_fetchall("SELECT * FROM " . tablename('ceshi5_map') . " WHERE weid = '{$_W['uniacid']}'");
		} elseif ($operation == 'post') {
			//添加或更新门店
			$id = intval($_GPC['id']);
			if (checksubmit('submit')) {
				$data = array(
					'weid' => $_W['uniacid'],
					'store' => $_GPC['store'],
					'address' => $_GPC['address'],
					'longitude' => $_GPC['baidumap']['lng'],
					'latitude' => $_GPC['baidumap']['lat'],
				);
				if (!empty($id)) {
					pdo_update('ceshi5_map', $data, array('id' => $id));
				} else {
					pdo_insert('ceshi5_map', $data);
					$id = pdo_insertid();
				}
				message('更新门店！', $this->createWebUrl('map', array('op' => 'display')), 'success');
			}
			//编辑页面查询数据
			if (!empty($id)) {
				$map = pdo_fetch("SELECT * FROM " . tablename('ceshi5_map') . " WHERE id = '$id' and weid = '{$_W['uniacid']}'");
			}
		} elseif ($operation == 'delete') {
			//删除门店
			$id = intval($_GPC['id']);
			$map = pdo_fetch("SELECT id  FROM " . tablename('ceshi5_map') . " WHERE id = '$id' AND weid=" . $_W['uniacid'] . "");
			if (empty($map)) {
				message('抱歉，门店不存在或是已经被删除！', $this->createWebUrl('map', array('op' => 'display')), 'error');
			}
			pdo_delete('ceshi5_map', array('id' => $id));
			message('门店删除成功！', $this->createWebUrl('map', array('op' => 'display')), 'success');
		} else {
			message('请求方式不存在');
		}
		include $this->template('map');
	}
}