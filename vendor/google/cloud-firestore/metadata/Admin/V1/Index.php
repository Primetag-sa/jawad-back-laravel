<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/firestore/admin/v1/index.proto

namespace GPBMetadata\Google\Firestore\Admin\V1;

class Index
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
%google/firestore/admin/v1/index.protogoogle.firestore.admin.v1google/api/resource.proto"�	
Index
name (	@
query_scope (2+.google.firestore.admin.v1.Index.QueryScope<
	api_scope (2).google.firestore.admin.v1.Index.ApiScope;
fields (2+.google.firestore.admin.v1.Index.IndexField5
state (2&.google.firestore.admin.v1.Index.State�

IndexField

field_path (	B
order (21.google.firestore.admin.v1.Index.IndexField.OrderH O
array_config (27.google.firestore.admin.v1.Index.IndexField.ArrayConfigH Q
vector_config (28.google.firestore.admin.v1.Index.IndexField.VectorConfigH �
VectorConfig
	dimension (B�AR
flat (2B.google.firestore.admin.v1.Index.IndexField.VectorConfig.FlatIndexH 
	FlatIndexB
type"=
Order
ORDER_UNSPECIFIED 
	ASCENDING

DESCENDING"9
ArrayConfig
ARRAY_CONFIG_UNSPECIFIED 
CONTAINSB

value_mode"i

QueryScope
QUERY_SCOPE_UNSPECIFIED 

COLLECTION
COLLECTION_GROUP
COLLECTION_RECURSIVE"/
ApiScope
ANY_API 
DATASTORE_MODE_API"I
State
STATE_UNSPECIFIED 
CREATING	
READY
NEEDS_REPAIR:z�Aw
firestore.googleapis.com/IndexUprojects/{project}/databases/{database}/collectionGroups/{collection}/indexes/{index}B�
com.google.firestore.admin.v1B
IndexProtoPZ9cloud.google.com/go/firestore/apiv1/admin/adminpb;adminpb�GCFS�Google.Cloud.Firestore.Admin.V1�Google\\Cloud\\Firestore\\Admin\\V1�#Google::Cloud::Firestore::Admin::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

